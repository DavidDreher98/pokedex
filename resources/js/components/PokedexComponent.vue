<template>
    <div>
        <div class="flex-w flex-jb flex-ac mt-2">
            <h1>Pokédex</h1>
            <div class="flex-as mr-4">
                <svg width="33px" height="33px" viewBox="0 0 512.000000 512.000000">
                    <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#757575" stroke="none">
                    <path d="M2085 4376 c-701 -115 -1239 -656 -1341 -1348 -22 -151 -15 -420 15 -560 186 -862 1011 -1408 1881 -1242 232 44 470 154 676 315 l61 47 414 -415 c228 -228 426 -421 441 -429 99 -52 196 45 144 144 -8 15 -201 213 -429 441 l-415 414 47 61 c299 384 409 853 311 1322 -128 615 -615 1100 -1239 1235 -123 27 -444 35 -566 15z m527 -226 c175 -37 325 -100 474 -198 311 -207 520 -514 600 -882 22 -101 30 -342 15 -453 -84 -627 -571 -1114 -1198 -1198 -111 -15 -352 -7 -453 15 -549 119 -964 533 -1082 1079 -29 136 -32 407 -5 540 113 560 551 997 1102 1101 126 24 131 25 295 21 107 -3 185 -10 252 -25z"/> </g>
                </svg>
                <input type="text" v-model="filter" placeholder="Search pokémon with: nº, name" class="input-search ml-05">
            </div>
            <div class="div-group-filter">
                <div class="group-filter" :data-active="filterActive">
                    <button type="button" class="button-filter" @click="filterActive = filterActive == 1 ? 0 : 1">
                        <svg width="25px" height="25px" viewBox="0 0 512.000000 512.000000">
                            <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#ccc" stroke="none">
                            <path d="M1525 4311 c-125 -32 -221 -137 -240 -264 l-7 -46 -348 -3 c-334 -3 -350 -4 -376 -24 -53 -39 -69 -71 -69 -134 0 -63 16 -95 69 -134 26 -20 42 -21 376 -24 l348 -3 7 -47 c8 -59 59 -155 98 -188 16 -14 53 -37 81 -52 l51 -27 245 0 245 0 63 34 c35 19 74 48 88 64 38 45 71 117 79 170 l7 47 1148 2 c1142 3 1149 3 1176 24 53 39 69 71 69 134 0 63 -16 95 -69 134 -27 21 -34 21 -1176 24 l-1148 2 -7 47 c-8 53 -41 125 -79 170 -14 16 -53 45 -88 64 l-63 34 -225 2 c-124 1 -238 -2 -255 -6z"/>
                            <path d="M2805 3031 c-125 -32 -221 -137 -240 -264 l-7 -47 -988 -2 c-981 -3 -989 -3 -1016 -24 -53 -39 -69 -71 -69 -134 0 -63 16 -95 69 -134 27 -21 35 -21 1016 -24 l988 -2 7 -48 c8 -59 59 -155 98 -188 16 -14 53 -37 81 -52 l51 -27 245 0 245 0 63 34 c35 19 74 48 88 64 38 45 71 117 79 170 l7 46 508 3 c496 3 509 4 536 24 53 39 69 71 69 134 0 63 -16 95 -69 134 -27 20 -40 21 -536 24 l-508 3 -7 46 c-8 53 -41 125 -79 170 -14 16 -53 45 -88 64 l-63 34 -225 2 c-124 1 -238 -2 -255 -6z"/>
                            <path d="M1525 1751 c-125 -32 -221 -137 -240 -264 l-7 -46 -348 -3 c-334 -3 -350 -4 -376 -24 -53 -39 -69 -71 -69 -134 0 -63 16 -95 69 -134 26 -20 42 -21 376 -24 l348 -3 7 -47 c8 -59 59 -155 98 -188 16 -14 53 -37 81 -52 l51 -27 245 0 245 0 63 34 c35 19 74 48 88 64 38 45 71 117 79 170 l7 47 1148 2 c1142 3 1149 3 1176 24 53 39 69 71 69 134 0 63 -16 95 -69 134 -27 21 -34 21 -1176 24 l-1148 2 -7 47 c-8 53 -41 125 -79 170 -14 16 -53 45 -88 64 l-63 34 -225 2 c-124 1 -238 -2 -255 -6z"/>
                            </g>
                        </svg>
                    </button>
                    <article>
                        <span>Sort by:</span>
                        <ul class="ul-orderby">
                            <li>
                                <label for="orderBy0-1000">
                                    <input type="radio" id="orderBy0-1000" name="orderBy" value="0" v-model="orderBy">
                                    <span>0-1000</span>
                                </label>
                            </li>
                            <li>
                                <label for="orderBy1000-0">
                                    <input type="radio" id="orderBy1000-0" name="orderBy" value="1" v-model="orderBy">
                                    <span>1000-0</span>
                                </label>
                            </li>
                            <li>
                                <label for="orderByA-Z">
                                    <input type="radio" id="orderByA-Z" name="orderBy" value="2" v-model="orderBy">
                                    <span>A-Z</span>
                                </label>
                            </li>
                            <li>
                                <label for="orderByZ-A">
                                    <input type="radio" id="orderByZ-A" name="orderBy" value="3" v-model="orderBy">
                                    <span>Z-A</span>
                                </label>
                            </li>
                        </ul>
                        <span>Filter by type:</span>
                        <ul class="ul-types">
                            <template v-for="type in types" :key="type.name">
                                <li v-if="!['unknown', 'shadow'].includes(type.name)" :data-type="type.name" :data-filter="filterType.length == 0 || filterType.includes(type.name)" @click="filterByType(type.name)">
                                    <img :src="assetPath('/img/types/' + type.name + '.svg')" :alt="type.name">
                                    <small>{{type.name}}</small>
                                </li>
                            </template>
                        </ul>
                        <div class="mt-2 flex-jc">
                            <a href="Javascript:;" class="reset" @click="resetFilters()">
                                <svg viewBox="0 0 512.000000 512.000000">
                                    <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)">
                                        <path d="M2510 4919 c-318 -39 -547 -106 -815 -239 -256 -126 -421 -245 -631 -455 -166 -166 -320 -377 -419 -574 -20 -40 -40 -70 -44 -65 -4 5 -65 129 -136 275 l-128 267 -152 -73 c-84 -40 -160 -77 -169 -82 -13 -7 25 -93 259 -578 174 -362 280 -570 289 -570 24 0 1136 539 1136 551 0 15 -149 318 -158 322 -5 1 -138 -60 -298 -137 -159 -76 -291 -137 -293 -135 -8 7 136 245 203 334 245 328 592 575 983 700 284 91 659 119 937 69 868 -154 1519 -820 1651 -1690 22 -138 22 -420 0 -558 -91 -597 -425 -1105 -936 -1422 -205 -127 -460 -223 -714 -268 -210 -38 -495 -32 -722 14 -450 91 -876 349 -1153 699 -51 65 -88 102 -95 98 -6 -4 -75 -52 -152 -107 l-141 -99 31 -45 c66 -92 219 -261 309 -341 179 -160 348 -274 553 -375 222 -109 453 -182 705 -221 161 -26 519 -26 680 -1 145 23 349 75 476 122 232 85 509 245 692 398 98 83 265 252 337 342 209 260 368 578 450 899 54 215 69 342 69 586 0 244 -15 371 -69 586 -82 321 -241 639 -450 899 -72 90 -239 259 -337 342 -183 153 -460 313 -692 398 -124 46 -329 99 -466 120 -124 19 -480 28 -590 14z"/>
                                    </g>
                                </svg>
                                Reset filters
                            </a>
                        </div>
                    </article>
                </div>
            </div>
        </div>
        <div class="pokedex-list">
            <a v-for="pokemon in pokedexFiltered" :key="pokemon" @click="openDetails(pokemon)">
                <aside>{{pokemon.id}}</aside>
                <figure class="card-figure-pokedex">
                    <img :src="pokemon.image" alt="Image pokemon">
                </figure>
                <div>
                    <span>{{pokemon.id}} &bull; {{pokemon.name}}</span>
                    <ul class="ul-types">
                        <li v-for="type in pokemon.types" :key="type" :data-type="type.type.name">
                            <img :src="assetPath('/img/types/' + type.type.name + '.svg')" alt="">
                            <small>{{type.type.name}}</small>
                        </li>
                    </ul>
                </div>
            </a>
        </div>
        <div class="notResults" v-show="pokedexFiltered.length == 0 && carregando == false && filter != null && filter.trim().length > 0">
            <span>Sorry, we couldn't find any pokemon with <span>"{{ filter }}"</span></span>
        </div>
        <status-component :carregando="carregando"></status-component>
        <modal-component :pokemon="pokemonCurrent" :active="modalActive" @closeModal="modalActive = false;"></modal-component>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                types: [],
                pokedex: [],
                pokedexFiltered: [],
                pokemonCurrent: null,
                orderBy: 0,
                filterActive: 0,
                filter: null,
                filterType: [],
                timeInterval: 300,
                intervalKey: null,
                carregando: false,
                modalActive: false,
            }
        },

        created(){
            this.getTypes();
            this.getPokedex();
        },

        methods: {
            // API

            async getTypes() {
                axios.get("https://pokeapi.co/api/v2/type").then(response => {
                    if (response && response.status == 200) {
                        this.getTypesDetails(response.data.results);
                    }
                });
            },

            async getTypesDetails(results){
                const typeRequests = results.map(type => {
                    if (this.pokedex.findIndex(item => item.name.toLowerCase() == type.name) == -1)
                        return axios.get(type.url);
                });

                const typeResponses = await Promise.all(typeRequests);

                typeResponses.forEach(response => {
                    if (response && response.status == 200) {
                        this.types.push(response.data);
                    }
                });
            },

            async getPokedex() {
                this.carregando = true;

                axios.get("https://pokeapi.co/api/v2/pokemon?offset=0&limit=1000").then(response => {
                    if (response && response.status == 200) {
                        this.getDetails(response.data.results);
                    }
                });
            },

            async getDetails(results) {
                const pokemonRequests = results.map(pokemon => {
                    if (this.pokedex.findIndex(item => item.name.toLowerCase() == pokemon.name) == -1)
                        return axios.get(pokemon.url);
                });

                const pokemonResponses = await Promise.all(pokemonRequests);

                pokemonResponses.forEach(response => {
                    if (response && response.status == 200) 
                        this.pushArray(response.data);
                });

                this.carregando = false;
            },

            async getEvolution(pokemonName) {
                let response = await axios.get(`https://pokeapi.co/api/v2/pokemon-species/${pokemonName}`);
                let evolutionChainUrl = response.data.evolution_chain.url;
                let evolutionChainResponse = await axios.get(evolutionChainUrl);

                let pokemonEvolutions = [];
                let currentEvolution = evolutionChainResponse.data.chain;

                while (currentEvolution) {
                    let pokemonName = currentEvolution.species.name;

                    let pokemonId = currentEvolution.species.url;
                    pokemonId = pokemonId.split("/");
                    pokemonId = pokemonId[pokemonId.length - 2];

                    let level = currentEvolution.evolution_details[0]?.min_level ?? null;

                    console.log("currentEvolution.species.url");
                    console.log(currentEvolution.species.url);
                    console.log("pokemonId");
                    console.log(pokemonId);

                    pokemonEvolutions.push(
                        { 
                            id: pokemonId, 
                            name: pokemonName.charAt(0).toUpperCase() + pokemonName.slice(1), 
                            level: level,
                            image: `https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/${pokemonId}.png`
                        }
                    );

                    currentEvolution = currentEvolution.evolves_to[0];
                }

                return pokemonEvolutions;
            },

            // Filters

            async filterAll(){
                this.carregando = true;

                this.pokedexFiltered = await this.pokedex.filter((item) => {
                    let isTrueFilter = true;
                    let isTrueFilterType = true;

                    if (this.filter && this.filter.trim().length > 0){
                        let onlyNumber = this.filter.replace(/[^0-9]/g,'');

                        if (onlyNumber > 0) 
                            isTrueFilter = item.id == onlyNumber;
                        else
                            isTrueFilter = item.name.toLowerCase().indexOf(this.filter.trim().toLowerCase()) !== -1;
                    }

                    if (this.filterType.length > 0)
                        isTrueFilterType = item.types.findIndex(type => this.filterType.includes(type.type.name)) != -1;

                    return isTrueFilter && isTrueFilterType;
                });

                this.sortBy();

                this.carregando = false;
            },

            filterByType(type) {
                if (this.filterType.length > 0) {
                    if (this.filterType.includes(type)) {
                        this.filterType = this.filterType.filter(c => c != type);
                    }else{
                        this.filterType.push(type);
                    }
                }else{
                    this.filterType.push(type);
                }

                this.filterAll();
            },

            resetFilters(){
                this.filter = null;
                this.filterType = [];
                this.orderBy = 0;
                this.filterAll();
            },

            // Sort By

            sortBy(){
                if(this.orderBy == 0)
                    this.pokedexFiltered.sort((a, b) => a.id - b.id);
                else if(this.orderBy == 1)
                    this.pokedexFiltered.sort((a, b) => b.id - a.id);
                else if(this.orderBy == 2)
                    this.pokedexFiltered.sort((a, b) => a.name.localeCompare(b.name));
                else if(this.orderBy == 3)
                    this.pokedexFiltered.sort((a, b) => b.name.localeCompare(a.name));
                
            },  

            // Others

            pushArray(pokemon){
                pokemon.name    = pokemon.name.charAt(0).toUpperCase() + pokemon.name.slice(1);
                pokemon.image   = `https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/${pokemon.id}.png`;

                this.pokedex.push(pokemon);
                this.pokedexFiltered.push(pokemon);
            },

            assetPath(path) {
                return window.location.origin + path;
            },

            // Pokemon Details

            async openDetails(pokemon){
                document.querySelector("body").style.overflow = "hidden";
                this.modalActive = true;

                if (pokemon.weaknesses == null || pokemon.advantages) {
                    let weaknesses = [];
                    let advantages = [];
                    await pokemon.types.map((type) => {
                        let details = this.types.find(i => i.name == type.type.name);
                        if (details) {
                            details.damage_relations.double_damage_from.forEach(item => {
                                weaknesses.push(item.name);
                            });
                            details.damage_relations.double_damage_to.forEach(item => {
                                advantages.push(item.name);
                            });
                        }
                    });

                    pokemon.weaknesses = [...new Set(weaknesses)];
                    pokemon.advantages = [...new Set(advantages)];
                }

                if (pokemon.evolution == null)
                    this.getEvolution(pokemon.name.toLowerCase()).then((response) => {
                        pokemon.evolution = response;
                    });
                
                this.pokemonCurrent = pokemon;
            },
        },

        watch: {
            filter: function(){
                clearTimeout(this.intervalKey);
                this.intervalKey = setTimeout(() => {
                    this.filterAll();
                }, this.timeInterval);
            },
            orderBy: function(){
                this.sortBy();
            }
        }
    }

</script>