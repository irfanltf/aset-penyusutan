 <div class="sidebar-menu">
     <ul class="menu">
         <li class="sidebar-title">Menu</li>

         <?php $request =  \Config\Services::request();

            ?>


         <li class="sidebar-item <?= $request->uri->getSegment(1) == 'home' ? 'active' : ''; ?>">
             <a href="/home" class='sidebar-link'>
                 <i class="bi bi-grid-1x2-fill"></i>
                 <span>Dashboard</span>
             </a>
         </li>


         <li class="sidebar-item  has-sub <?= $request->uri->getSegment(1) == 'aset' || $request->uri->getSegment(1) == 'kategori' ? 'active' : ''; ?>">
             <a href="#" class='sidebar-link'>
                 <i class="bi bi-archive-fill"></i>
                 <span>Aktiva Tetap</span>
             </a>
             <ul class="submenu <?= $request->uri->getSegment(1) == 'aset' || $request->uri->getSegment(1) == 'kategori' ? 'active' : ''; ?>">
                 <li class="submenu-item <?= $request->uri->getSegment(1) == 'kategori' ? 'active' : ''; ?>">
                     <a href="/kategori">Kategori Aktiva Tetap</a>
                 </li>
                 <li class="submenu-item <?= $request->uri->getSegment(1) == 'aset'  ? 'active' : ''; ?>">
                     <a href="/aset">Ativa Tetap</a>
                 </li>

             </ul>
         </li>
         <br><br><br>
         <li class="sidebar-item ">

             <a href="/login/logout" class='sidebar-link'>
                 <i class="bi bi-box-arrow-right"></i>
                 <span>Logout</span>
             </a>
         </li>





     </ul>
 </div>