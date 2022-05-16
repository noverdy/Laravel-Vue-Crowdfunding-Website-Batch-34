<template>
    <div>
        <v-card v-if="campaign.id">
            <v-img :src="campaign.image" class="text-white" height="200px">
                <v-card-title
                    class="fill-height align-end"
                    v-text="campaign.title"
                ></v-card-title>
            </v-img>

            <v-card-text>
                <v-table density="compact">
                    <tbody>
                        <tr>
                            <td><v-icon>mdi-home-city</v-icon> Alamat</td>
                            <td>{{ campaign.address }}</td>
                        </tr>
                        <tr>
                            <td><v-icon>mdi-hand-heart</v-icon> Terkumpul</td>
                            <td class="text-blue">
                                Rp
                                {{ campaign.collected.toLocaleString("id-ID") }}
                            </td>
                        </tr>
                        <tr>
                            <td><v-icon>mdi-cash</v-icon> Dibutuhkan</td>
                            <td class="text-blue">
                                Rp
                                {{ campaign.required.toLocaleString("id-ID") }}
                            </td>
                        </tr>
                    </tbody>
                </v-table>
                Description: <br />
                {{ campaign.description }}
            </v-card-text>
            <v-card-actions>
                <v-btn
                    block
                    color="primary"
                    @click="donate"
                    :disabled="campaign.collected >= campaign.required"
                >
                    <v-icon>mdi-money</v-icon> &nbsp; DONATE
                </v-btn>
            </v-card-actions>
        </v-card>
    </div>
</template>

<script>
export default {
    data: () => ({
        campaign: {},
    }),
    created() {
        this.go();
    },
    methods: {
        go() {
            let { id } = this.$route.params;
            let url = "/api/campaign/" + id;
            axios
                .get(url)
                .then((response) => {
                    let { data } = response.data;
                    this.campaign = data.campaign;
                })
                .catch((error) => {
                    let { responses } = error;
                    console.log(responses);
                });
        },
        donate() {
            alert("Donate");
        },
    },
};
</script>