const Home = () =>
    import ('./components/HomeComponent.vue');

//const About = { template: '<div>About</div>' }

const MostrarVehiculo = () =>
    import ('./components/vehiculo/MostrarVehiculoComponent.vue');

const CrearVehiculo = () =>
    import ('./components/vehiculo/CrearVehiculoComponent.vue');

const EditarVehiculo = () =>
    import ('./components/vehiculo/EditarVehiculoComponent.vue');
//import ExampleComponent from "../js/components/ExampleComponent.vue";

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
];

export default routes