<template>
    <div>
        <v-container>
            <h2>All Campaigns</h2>
            <v-layout wrap>
                <div
                    class="flex xs6"
                    v-for="campaign in campaigns"
                    :key="`campaign-` + campaign.id"
                >
                    <campaign-item :campaign="campaign"></campaign-item>
                </div>
            </v-layout>
            <v-pagination
                v-model="page"
                @input="go"
                :length="lengthPage"
                :total-visible="6"
            ></v-pagination>
        </v-container>
    </div>
</template>

<script>
export default {
    data: () => ({
        campaigns: [],
        page: 0,
        lengthPage: 0,
    }),
    created() {
        this.go();
    },
    methods: {
        go() {
            let url = "api/campaign?page=" + this.page;
            axios
                .get(url)
                .then((response) => {
                    let { data } = response.data;
                    this.campaigns = data.campaigns.data;
                    this.page = data.campaigns.current_page;
                    this.lengthPage = data.campaigns.last_page;
                })
                .catch((error) => {
                    let { responses } = error;
                    console.log(responses);
                });
        },
    },
};
</script>