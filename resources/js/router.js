const Home = () =>
    import ('./components/HomeComponent.vue');

const MostrarVehiculo = () =>
    import ('./components/vehiculo/MostrarVehiculoComponent.vue');

const CrearVehiculo = () =>
    import ('./components/vehiculo/CrearVehiculoComponent.vue');

const EditarVehiculo = () =>
    import ('./components/vehiculo/EditarVehiculoComponent.vue');

const MostrarMarca = () =>
    import ('./components/marca/MostrarMarcaComponent.vue');

const CrearMarca = () =>
    import ('./components/marca/CrearMarcaComponent.vue');

const EditarMarca = () =>
    import ('./components/marca/EditarMarcaComponent.vue');



const routes = [{
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/vehiculos',
        name: 'mostrarVehiculos',
        component: MostrarVehiculo
    },

    {
        path: '/vehiculos/crear',
        name: 'crearVehiculo',
        component: CrearVehiculo
    },
    {
        path: '/vehiculos/editar/:id',
        name: 'editarVehiculo',
        component: EditarVehiculo
    },
    {
        path: '/marcas',
        name: 'mostrarMarcas',
        component: MostrarMarca
    },

    {
        path: '/marcas/crear',
        name: 'crearMarca',
        component: CrearMarca
    },
    {
        path: '/marcas/editar/:id',
        name: 'editarMarca',
        component: EditarMarca
    },
];

export default routes