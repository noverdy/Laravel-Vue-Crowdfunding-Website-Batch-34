<template>
    <v-app>
        <!-- Sidebar -->
        <v-navigation-drawer app v-model="drawer">
            <v-list>
                <v-list-item v-if="!guest">
                    <v-list-item-avatar>
                        <v-img
                            src="https://randomuser.me/api/portraits/men/78.jpg"
                        ></v-img>
                    </v-list-item-avatar>
                    <v-list-item-media class="pl-3">
                        <v-list-item-title>Noverdi Ramadhan</v-list-item-title>
                    </v-list-item-media>
                </v-list-item>

                <div class="pa-2" v-if="guest">
                    <v-btn block color="primary" class="mb-1">
                        <v-icon left color="white">mdi-lock</v-icon>
                        Login
                    </v-btn>
                    <v-btn block color="success">
                        <v-icon left>mdi-account</v-icon>
                        Register
                    </v-btn>
                </div>

                <v-divider></v-divider>

                <v-list-item
                    v-for="(item, index) in menus"
                    :key="`menu-` + index"
                    :to="item.route"
                >
                    <v-list-item-icon>
                        {{ item.icon }}
                    </v-list-item-icon>
                    <v-list-item-media class="pl-4">
                        <v-list-item-title>{{ item.title }}</v-list-item-title>
                    </v-list-item-media>
                </v-list-item>
            </v-list>

            <template v-slot:append v-if="!guest">
                <div class="pa-2">
                    <v-btn block color="red" dark>
                        <v-icon left>mdi-lock</v-icon>
                        Logout
                    </v-btn>
                </div>
            </template>
        </v-navigation-drawer>

        <!-- Header -->
        <v-app-bar app color="success" dark v-if="isHome">
            <v-app-bar-nav-icon
                @click.stop="drawer = !drawer"
            ></v-app-bar-nav-icon>

            <v-toolbar-title>SanbercodeApp</v-toolbar-title>

            <v-spacer></v-spacer>

            <v-btn icon>
                <v-badge color="orange" overlap>
                    <template v-slot:badge>
                        <span>3</span>
                    </template>
                    <v-icon>mdi-cash-multiple</v-icon>
                </v-badge>
            </v-btn>

            <template v-slot:extension>
                <v-text-field
                    hide-details
                    append-inner-icon="mdi-microphone"
                    label="Search"
                    flat
                    prepend-inner-icon="mdi-magnify"
                    solo-inverted
                ></v-text-field>
            </template>
        </v-app-bar>

        <v-app-bar app color="success" dark v-else>
            <v-btn icon @click.stop="$router.go(-1)">
                <v-icon>mdi-arrow-left-circle</v-icon>
            </v-btn>

            <v-spacer></v-spacer>

            <v-btn icon>
                <v-badge color="orange" overlap>
                    <template v-slot:badge>
                        <span>3</span>
                    </template>
                    <v-icon>mdi-cash-multiple</v-icon>
                </v-badge>
            </v-btn>
        </v-app-bar>

        <!-- Content -->
        <v-main>
            <v-container fluid>
                <v-slide-y-transition>
                    <router-view></router-view>
                </v-slide-y-transition>
            </v-container>
        </v-main>

        <!-- Footer -->
        <v-card>
            <v-footer app class="bg-grey-lighten-3">
                <v-card-text class="text-center">
                    &copy; {{ new Date().getFullYear() }} -
                    <strong>SanbercodeApp</strong>
                </v-card-text>
            </v-footer>
        </v-card>
    </v-app>
</template>
<script>
export default {
    name: "App",
    data: () => ({
        drawer: false,
        menus: [
            { title: "Home", icon: "mdi-home", route: "/" },
            { title: "Campaigns", icon: "mdi-hand-heart", route: "/campaigns" },
            { title: "Blogs", icon: "mdi-book", route: "/blogs" },
        ],
        guest: false,
    }),
    computed: {
        isHome() {
            return this.$route.path === "/" || this.$route.path === "/home";
        },
    },
};
</script>