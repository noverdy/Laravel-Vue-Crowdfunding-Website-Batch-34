<template>
    <div class="mx-1">
        <v-card
            :to="`/campaign/` + campaign.id"
            style="background: #fafafa; border: 1px solid #f0f0f0"
        >
            <v-img :src="campaign.image" class="text-white" height="200px">
                <v-card-title
                    class="fill-height align-end"
                    v-text="campaign.title"
                ></v-card-title>
            </v-img>

            <v-card-actions>
                <v-progress-linear
                    v-model="progress"
                    color="blue-grey"
                    height="7"
                ></v-progress-linear>
            </v-card-actions>

            <v-card-actions>
                <v-icon>mdi-cash</v-icon>
                <span style="margin-end: 1rem"
                    >Rp {{ campaign.required.toLocaleString("id-ID") }}
                </span>
                <span>{{ progress }}%</span>
            </v-card-actions>
        </v-card>
    </div>
</template>

<script>
export default {
    name: "campaign-item",
    props: ["campaign"],
    computed: {
        progress() {
            return (
                (this.campaign.collected / this.campaign.required) *
                100
            ).toFixed(2);
        },
    },
};
</script>