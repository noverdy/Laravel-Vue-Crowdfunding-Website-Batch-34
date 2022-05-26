<template>
    <div>
        <h1>Halaman Social.vue</h1>
    </div>
</template>
<script>
import { mapActions, mapGetters } from "vuex";
export default {
    data() {
        return {
            code: "",
            provider: "",
        };
    },
    computed: {
        ...mapGetters({
            user: "auth/user",
        }),
    },
    methods: {
        ...mapActions({
            setAlert: "alert/set",
            setAuth: "auth/set",
            setDialogStatus: "dialog/setStatus",
        }),
        go(fullPath) {
            let url = "/api" + fullPath;
            axios
                .get(url)
                .then((response) => {
                    let { data } = response.data;
                    this.setAuth(data);
                    if (this.user.user.id.length > 0) {
                        this.setAlert({
                            status: true,
                            color: "success",
                            text: "Login success",
                        });
                        this.setDialogStatus(false);
                        this.$router.push({ name: "home" });
                    } else {
                        this.setAlert({
                            status: true,
                            color: "error",
                            text: "Login failed",
                        });
                    }
                })
                .catch((error) => {
                    this.setAlert({
                        status: true,
                        color: "error",
                        text: "Login failed",
                    });
                });
        },
    },
    mounted() {
        this.go(this.$route.fullPath);
    },
};
</script>