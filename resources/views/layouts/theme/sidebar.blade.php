<div class="sidebar-wrapper sidebar-theme">
    <nav id="compactSidebar">

        <ul class="menu-categories">

            @can('Home_Index')
            <li class="active">
                {{-- href="{{url('categories')}}"  --}}
                <a href="{{url('home')}}" class="menu-toggle" data-active="true">
                    <div class="base-menu">
                        <div class="base-icons">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>

                        </div>
                        <span>TABLERO</span>
                    </div>
                </a>
            </li>
            @endcan
            @can('Pos_Index')
            <li class="">
                {{-- {{ url('pos') }} --}}
                <a href="{{ url('pos') }}" class="menu-toggle" data-active="false">
                    <div class="base-menu">
                        <div class="base-icons">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                       </div>
                       <span>VENTAS</span>
                   </div>
               </a>
           </li>
           @endcan
            @can('Category_Index')
            <li class="active">
                {{-- href="{{url('categories')}}"  --}}
                <a href="{{url('categories')}}" class="menu-toggle" data-active="true">
                    <div class="base-menu">
                        <div class="base-icons">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                        </div>
                        <span>CATEGORÍAS</span>
                    </div>
                </a>
            </li>
            @endcan

            @can('Product_Index')
            <li class="">
                {{-- {{ url('products') }} --}}
                <a href="{{ url('products') }}" class="menu-toggle" data-active="false">
                    <div class="base-menu">
                        <div class="base-icons">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7.01" y2="7"></line></svg>
                        </div>
                        <span>PRODUCTOS</span>
                    </div>
                </a>
            </li>
            @endcan

            @can('Role_Index')
           <li class="">
            {{-- {{ url('roles') }} --}}
            <a href="{{ url('roles') }}" class="menu-toggle" data-active="false">
                <div class="base-menu">
                    <div class="base-icons">
                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-key"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path></svg>
                   </div>
                   <span>ROLES</span>
               </div>
           </a>
       </li>
       @endcan
       @can('Permission_Index')
       <li class="">
        {{-- {{ url('permisos') }} --}}
        <a href="{{ url('permisos') }}" class="menu-toggle" data-active="false">
            <div class="base-menu">
                <div class="base-icons">
                   <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
               </div>
               <span>PERMISOS</span>
           </div>
       </a>
   </li>
   @endcan
   @can('Asignar_Index')
   <li class="">
    {{-- {{ url('asignar') }} --}}
    <a href="{{url('asignar') }}" class="menu-toggle" data-active="false">
        <div class="base-menu">
            <div class="base-icons">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
          </div>
          <span>ASIGNAR</span>
      </div>
  </a>
</li>
@endcan
@can('User_Index')
<li class="">
    {{-- {{ url('users') }} --}}
    <a href="{{ url('users') }}" class="menu-toggle" data-active="false">
        <div class="base-menu">
            <div class="base-icons">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
           </div>
           <span>USUARIOS</span>
       </div>
   </a>
</li>
@endcan
@can('Denomination_Index')
<li class="">
    {{-- {{ url('coins') }} --}}
    <a href="{{ url('coins') }}" class="menu-toggle" data-active="false">
        <div class="base-menu">
            <div class="base-icons">
             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-stop-circle"><circle cx="12" cy="12" r="10"></circle><rect x="9" y="9" width="6" height="6"></rect></svg>
         </div>
         <span>MONEDAS</span>
     </div>
 </a>
</li>
@endcan
@can('Client_Index')

<li class="">
    {{-- {{ url('pos') }} --}}
    <a href="{{ url('clients') }}" class="menu-toggle" data-active="false">
        <div class="base-menu">
            <div class="base-icons">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>           
            </div>
           <span>CLIENTES</span>
       </div>
   </a>
</li>
@endcan
@can('Route_Index')

<li class="">
    {{-- {{ url('pos') }} --}}
    <a href="{{ url('pos') }}" class="menu-toggle" data-active="false">
        <div class="base-menu">
            <div class="base-icons">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>
            </div>
            <span>RUTAS</span>
       </div>
   </a>
</li>
@endcan
@can('Orders_Index')

<li class="">
    {{-- {{ url('pos') }} --}}
    <a href="{{ url('pos') }}" class="menu-toggle" data-active="false">
        <div class="base-menu">
            <div class="base-icons">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>
            </div>
            <span>PEDIDOS</span>
       </div>
   </a>
</li>
@endcan
@can('Deliver_Index')

<li class="">
    {{-- {{ url('pos') }} --}}
    <a href="{{ url('pos') }}" class="menu-toggle" data-active="false">
        <div class="base-menu">
            <div class="base-icons">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-truck"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
            </div>
            <span>ENTREGAS</span>
       </div>
   </a>
</li>
@endcan
@can('Cashout_Index')
<li class="">
    {{-- {{url('cashout')}} --}}
    <a href="{{url('cashout')}}" class="menu-toggle" data-active="false">
        <div class="base-menu">
            <div class="base-icons">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
            </div>
            <span>ARQUEOS</span>
        </div>
    </a>
</li>
@endcan
@can('Reports_Index')
<li class="">
    {{-- {{url('reports')}} --}}
    <a href="{{url('reports')}}" class="menu-toggle" data-active="false">
        <div class="base-menu">
            <div class="base-icons">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pie-chart"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path><path d="M22 12A10 10 0 0 0 12 2v10z"></path></svg>
            </div>
            <span>REPORTES</span>
        </div>
    </a>
</li>
@endcan
</ul>



</nav>
</div>

<div id="compact_submenuSidebar" class="submenu-sidebar" style="display: none!important">
</div>
