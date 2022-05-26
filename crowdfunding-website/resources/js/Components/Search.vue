<template>
    <v-card>
        <v-toolbar dark color="success">
            <v-btn icon dark @click="close">
                <v-icon>mdi-close</v-icon>
            </v-btn>
            <v-text-field
                hide-details
                append-icon="mdi-microphone"
                flat
                autofocus
                label="search"
                prepend-inner-icon="mdi-magnify"
                v-model="keyword"
                @input="doSearch"
            >
            </v-text-field>
        </v-toolbar>
        <v-card-text>
            <v-alert-title v-if="keyword.length > 0">
                Result search "{{ keyword }}"
            </v-alert-title>

            <v-alert
                v-if="campaigns.length == 0 && keyword.length > 0"
                color="warning"
                variant="outlined"
            >
                Sorry, but no results were found.
            </v-alert>

            <v-container class="ma-0 pa-0" grid-list-sm>
                <v-layout wrap>
                    <div
                        v-for="campaign in campaigns"
                        :key="`campaign-` + campaign.id"
                    >
                        <campaign-item :campaign="campaign" @click="close" />
                    </div>
                </v-layout>
            </v-container>
        </v-card-text>
    </v-card>
</template>

<script>
import CampaignItem from "./CampaignItem";

export default {
    name: "search",
    components: {
        CampaignItem,
    },
    data() {
        return {
            keyword: "",
            campaigns: [],
        };
    },
    methods: {
        doSearch() {
            let keyword = this.keyword;
            if (keyword.length > 0) {
                let url = "/api/campaign/search/" + keyword;
                axios
                    .get(url)
                    .then((response) => {
                        let { data } = response.data;
                        this.campaigns = data.campaigns;
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            } else {
                this.campaigns = [];
            }
        },
        close() {
            this.$emit("closed", false);
        },
    },
};
</script>