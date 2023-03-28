<template>
    <aside class="modal" :data-active="active" @click.self="closeModal()">
        <section>
            <img v-if="pokemon" :src="assetPath('/img/types/' + pokemon.types[0].type.name + '.svg')" alt="">
            <header>
                <button type="button" @click="closeModal()">
                    <svg viewBox="0 0 512.000000 512.000000"> 
                        <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)">
                            <path d="M161 5103 c-88 -31 -161 -136 -161 -233 0 -20 7 -59 16 -86 15 -45 106 -139 1103 -1137 l1086 -1087 -1082 -1083 c-594 -595 -1089 -1097 -1098 -1116 -45 -90 -24 -213 50 -286 69 -70 163 -91 261 -59 45 15 139 106 1136 1103 l1088 1086 1088 -1086 c997 -997 1091 -1088 1136 -1103 98 -32 192 -11 261 59 70 69 91 163 59 261 -15 45 -106 139 -1103 1137 l-1086 1087 1086 1088 c997 997 1088 1091 1103 1136 32 98 11 192 -59 261 -69 70 -163 91 -261 59 -45 -15 -139 -106 -1137 -1103 l-1087 -1086 -1088 1086 c-997 997 -1091 1088 -1136 1103 -61 20 -117 19 -175 -1z"/>
                        </g>
                    </svg>
                </button>
            </header>
            <div v-if="pokemon" class="modal-body">
                <div>
                    <article>
                        <h1 class="mb-1">{{pokemon.id}} &bull; {{pokemon.name}}</h1>
                        <h3 class="mb-1">Height: {{ pokemon.height / 10 }} m</h3>
                        <h3 class="mb-1">Weight: {{ pokemon.weight / 10 }} kg</h3>
                        <h3>Type</h3>
                        <ul class="ul-types mb-1">
                            <li v-for="type in pokemon.types" :key="type" :data-type="type.type.name">
                                <img :src="assetPath('/img/types/' + type.type.name + '.svg')" alt="">
                                <small>{{type.type.name}}</small>
                            </li>
                        </ul>
                        <h3 v-if="pokemon.weaknesses && pokemon.weaknesses.length > 0">Weaknesses</h3>
                        <ul class="ul-types mb-1" v-if="pokemon.weaknesses && pokemon.weaknesses.length > 0">
                            <li v-for="weakness in pokemon.weaknesses" :key="weakness" :data-type="weakness">
                                <img :src="assetPath('/img/types/' + weakness + '.svg')" alt="">
                                <small>{{weakness}}</small>
                            </li>
                        </ul>
                        <h3 v-if="pokemon.advantages && pokemon.advantages.length > 0">Advantages</h3>
                        <ul class="ul-types mb-1" v-if="pokemon.advantages && pokemon.advantages.length > 0">
                            <li v-for="advantage in pokemon.advantages" :key="advantage" :data-type="advantage">
                                <img :src="assetPath('/img/types/' + advantage + '.svg')" alt="">
                                <small>{{advantage}}</small>
                            </li>
                        </ul>
                    </article>
                    <figure class="modal-image-pokemon">
                        <img :src="pokemon.image" alt="Image pokemon">
                    </figure>
                    <article>
                        <chart-component :chart="chart"></chart-component>
                    </article>
                </div>
                <section v-if="pokemon.evolution && pokemon.evolution.length > 0" class="pokemon-evolution">
                    <h1>Evolutions</h1>
                    <article>
                        <a v-for="pokemonEv in pokemon.evolution" :key="pokemonEv" @click="openDetails(pokemonEv)">
                            <figure>
                                <img :src="pokemonEv.image" alt="Image pokemonEv">
                                <small v-if="pokemonEv.level">{{ pokemonEv.level }} lvUP</small>
                                <small v-else>Begin</small>
                            </figure>
                            <div class="mt-05">
                                <span>{{ pokemonEv.id }} &bull; {{ pokemonEv.name }}</span>
                            </div>
                        </a>
                    </article>
                </section>
                
            </div>

        </section>
    </aside>
</template>
<script>
import ChartComponent from './ChartComponent.vue';
    export default {
    components: { ChartComponent },
        props:{
            pokemon: {
                require: true
            },
            active: {
                require: true
            }
        },
        data() {
            return {
                chart:{
                    labels: [],
                    values: []
                }
            }
        },

        methods: {
            closeModal(){
                this.$emit("closeModal");
                document.querySelector("body").style.overflow = "auto";
            },

            // Others

            assetPath(path) {
                return window.location.origin + path;
            },


        },

        watch: {
            pokemon: function(){
                this.chart.labels = [];
                this.chart.values = [];

                this.pokemon.stats.forEach(element => {
                    let label = element.stat.name.charAt(0).toUpperCase() + element.stat.name.slice(1);
                    this.chart.labels.push(label);
                    this.chart.values.push(element.base_stat);
                });
            }
        }
    }

</script>