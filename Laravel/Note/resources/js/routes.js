import AllNotes from './components/AllNotes.vue';
import CreateNote from './components/CreateNote.vue';
import EditNote from './components/EditNote.vue';

export const routes = [{
        name: 'home',
        path: '/',
        component: AllNotes
    },
    {
        name: 'create',
        path: '/create',
        component: CreateNote
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditNote
    }
];