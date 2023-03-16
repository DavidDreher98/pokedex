<template>
    <div>
        <div class="flex-jb flex-ac mt-2">
            <h1>Pokédex</h1>
            <div class="flex-as mr-4">
                <svg width="33px" height="33px" viewBox="0 0 512.000000 512.000000">
                    <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#757575" stroke="none">
                    <path d="M2085 4376 c-701 -115 -1239 -656 -1341 -1348 -22 -151 -15 -420 15 -560 186 -862 1011 -1408 1881 -1242 232 44 470 154 676 315 l61 47 414 -415 c228 -228 426 -421 441 -429 99 -52 196 45 144 144 -8 15 -201 213 -429 441 l-415 414 47 61 c299 384 409 853 311 1322 -128 615 -615 1100 -1239 1235 -123 27 -444 35 -566 15z m527 -226 c175 -37 325 -100 474 -198 311 -207 520 -514 600 -882 22 -101 30 -342 15 -453 -84 -627 -571 -1114 -1198 -1198 -111 -15 -352 -7 -453 15 -549 119 -964 533 -1082 1079 -29 136 -32 407 -5 540 113 560 551 997 1102 1101 126 24 131 25 295 21 107 -3 185 -10 252 -25z"/> </g>
                </svg>
                <input type="text" v-model="filter" placeholder="Search pokémon with: nº, name, types." class="input-search ml-05">
            </div>
            <div class="div-group-filter">
                <div class="group-filter" :data-active="filterActive" @click="filterActive = filterActive == 1 ? 0 : 1">
                    <button type="button" class="button-filter">
                        <svg width="25px" height="25px" viewBox="0 0 512.000000 512.000000">
                            <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#ccc" stroke="none">
                            <path d="M1525 4311 c-125 -32 -221 -137 -240 -264 l-7 -46 -348 -3 c-334 -3 -350 -4 -376 -24 -53 -39 -69 -71 -69 -134 0 -63 16 -95 69 -134 26 -20 42 -21 376 -24 l348 -3 7 -47 c8 -59 59 -155 98 -188 16 -14 53 -37 81 -52 l51 -27 245 0 245 0 63 34 c35 19 74 48 88 64 38 45 71 117 79 170 l7 47 1148 2 c1142 3 1149 3 1176 24 53 39 69 71 69 134 0 63 -16 95 -69 134 -27 21 -34 21 -1176 24 l-1148 2 -7 47 c-8 53 -41 125 -79 170 -14 16 -53 45 -88 64 l-63 34 -225 2 c-124 1 -238 -2 -255 -6z"/>
                            <path d="M2805 3031 c-125 -32 -221 -137 -240 -264 l-7 -47 -988 -2 c-981 -3 -989 -3 -1016 -24 -53 -39 -69 -71 -69 -134 0 -63 16 -95 69 -134 27 -21 35 -21 1016 -24 l988 -2 7 -48 c8 -59 59 -155 98 -188 16 -14 53 -37 81 -52 l51 -27 245 0 245 0 63 34 c35 19 74 48 88 64 38 45 71 117 79 170 l7 46 508 3 c496 3 509 4 536 24 53 39 69 71 69 134 0 63 -16 95 -69 134 -27 20 -40 21 -536 24 l-508 3 -7 46 c-8 53 -41 125 -79 170 -14 16 -53 45 -88 64 l-63 34 -225 2 c-124 1 -238 -2 -255 -6z"/>
                            <path d="M1525 1751 c-125 -32 -221 -137 -240 -264 l-7 -46 -348 -3 c-334 -3 -350 -4 -376 -24 -53 -39 -69 -71 -69 -134 0 -63 16 -95 69 -134 26 -20 42 -21 376 -24 l348 -3 7 -47 c8 -59 59 -155 98 -188 16 -14 53 -37 81 -52 l51 -27 245 0 245 0 63 34 c35 19 74 48 88 64 38 45 71 117 79 170 l7 47 1148 2 c1142 3 1149 3 1176 24 53 39 69 71 69 134 0 63 -16 95 -69 134 -27 21 -34 21 -1176 24 l-1148 2 -7 47 c-8 53 -41 125 -79 170 -14 16 -53 45 -88 64 l-63 34 -225 2 c-124 1 -238 -2 -255 -6z"/>
                            </g>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="pokedex-list">
            <a v-for="pokemon in pokedex" :key="pokemon">
                <aside>{{pokemon.id}}</aside>
                <figure class="card-figure-pokedex">
                    <img :src="pokemon.image" alt="Image pokemon">
                </figure>
                <div>
                    <span>{{pokemon.id}}. {{pokemon.name}}</span>
                    <ul class="ul-types-pokedex">
                        <li v-for="type in pokemon.types" :key="type" :data-type="type.type.name">{{type.type.name}}</li>
                    </ul>
                </div>
            </a>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                urlApi: 'https://pokeapi.co/api/v2/',
                pokedex: [],
                filterActive: 0,
                filter: null,
                timeInterval: 300,
                intervalKey: null
            }
        },

        created(){
            this.loadingData();
        },

        methods: {
            loadingData(){
                axios.get(this.urlApi + 'pokemon').then(response => {
                    this.pokedex = [];
                    if(response.status == 200){
                        response.data.results.forEach((pokemon, index) => {
                            var obj = new Object();
    

                            obj.id      = parseInt(pokemon.url.split('/')[pokemon.url.split('/').length - 2]);
                            obj.name    = pokemon.name.charAt(0).toUpperCase() + pokemon.name.slice(1);
                            obj.url     = pokemon.url;
                            obj.image   = `https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/${obj.id}.png`;
           
                            this.pokedex.push(obj);
                        });
                    }
                });
            }
        },

        watch: {
            filter: function(){
                clearTimeout(this.intervalKey);
                this.intervalKey = setTimeout(() => {
                    this.loadingData();
                }, this.timeInterval);
            }
        }
    }

</script>