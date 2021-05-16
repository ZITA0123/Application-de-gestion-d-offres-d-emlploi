import { Component, OnInit } from '@angular/core';

declare const $: any;
declare interface RouteInfo {
    path: string;
    title: string;
    icon: string;
    class: string;
}
export const ROUTES: RouteInfo[] = [
    { path: '/update-offer', title: 'update offre',  icon: 'dashboard', class: '' },
    { path: '/add-offer', title: 'ADD offers',  icon:'work', class: '' },
    { path: '/list-offers', title: 'List Offers',  icon:'content_paste', class: '' },
    { path: '/typography', title: 'detail',  icon:'library_books', class: '' },
    
];

@Component({
  selector: 'app-sidebar',
  templateUrl: './sidebar.component.html',
  styleUrls: ['./sidebar.component.css']
})
export class SidebarComponent implements OnInit {
  menuItems: any[];

  constructor() { }

  ngOnInit() {
    this.menuItems = ROUTES.filter(menuItem => menuItem);
  }
  isMobileMenu() {
      if ($(window).width() > 991) {
          return false;
      }
      return true;
  };
}
