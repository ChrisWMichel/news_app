
import Articles from './components/public/DisplayArticles'
import SideMenu from './components/public/SideMenu'
import ViewRoute from './components/public/ViewRoute'


export const routes =[
    //{path: '/', component: ViewRoute, name: 'view_route'},
    {path: '/', component: SideMenu, name: 'sideMenu'},
    {path:'/:category_id', name: 'category', component: SideMenu},


    {path: '*', redirect:{name: 'sideMenu'}}

];