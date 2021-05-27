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
         <li class="sidebar-item <?= $request->uri->getSegment(1) == 'aset' ? 'active' : ''; ?>">

             <a href="/aset" class='sidebar-link'>
                 <i class="bi bi-archive-fill"></i>
                 <span>Aset</span>
             </a>
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