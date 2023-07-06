<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion sticky-top " id="accordionSidebar" style="position:sticky;">
<div class="sticky-top">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        PETSHOP
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item active">
        <a class="nav-link" href="makanan.php">
            <i class="fas fa-list"></i>
            <span>Data Makanan</span>
        </a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="obat.php">
            <i class="fas fa-list"></i>
            <span>Data Obat</span>
        </a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="jadwal.php">
            <i class="fas fa-list"></i>
            <span>Data Jadwal Praktik</span>
        </a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="pendataan_pasien.php">
            <i class="fas fa-list"></i>
            <span>Pendataan Pasien</span>
        </a>
    </li>

    <li class="nav-item active">
		<a class="nav-link .small" href="#"><i class="fas fa-list"></i><span> Pembukuan</span></a>
		<ul class="submenu collapse">
			<li class="nav-item active" style="list-style-type: none;">
                <a class="nav-link" href="pembukuan.php">
                    <i class="fas fa-list"></i>
                    <span>Harian</span>
                </a>
            </li>
		    <li class="nav-item active" style="list-style-type: none;">
                <a class="nav-link" href="mingguan.php">
                    <i class="fas fa-list"></i>
                    <span>Mingguan</span>
                </a>
            </li>
		    <li class="nav-item active" style="list-style-type: none;">
                <a class="nav-link" href="Bulanan.php">
                    <i class="fas fa-list"></i>
                    <span>Bulanan</span>
                </a>
            </li>
            <li class="nav-item active" style="list-style-type: none;">
                <a class="nav-link" href="tahunan.php">
                    <i class="fas fa-list"></i>
                    <span>Tahunan</span>
                </a>
            </li>
		</ul>
	</li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle" style="margin-left: 34%; margin-right: 34%;"></button>
    </div>
    </div>

</ul>

<script type="text/javascript">

	document.addEventListener("DOMContentLoaded", function(){

		document.querySelectorAll('.sidebar .nav-link').forEach(function(element){

			element.addEventListener('click', function (e) {

				let nextEl = element.nextElementSibling;
				let parentEl  = element.parentElement;	

				if(nextEl) {
					e.preventDefault();	
					let mycollapse = new bootstrap.Collapse(nextEl);

			  		if(nextEl.classList.contains('show')){
			  			mycollapse.hide();
			  		} else {
			  			mycollapse.show();
			  			// find other submenus with class=show
			  			var opened_submenu = parentEl.parentElement.querySelector('.submenu.show');
			  			// if it exists, then close all of them
						if(opened_submenu){
							new bootstrap.Collapse(opened_submenu);
						}

			  		}
		  		}

			});
		})

	}); 
	// DOMContentLoaded  end
</script>