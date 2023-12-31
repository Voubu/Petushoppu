<link rel="stylesheet" type="text/css" href="../css/untukSidebar.css">

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion sticky-top" id="accordionSidebar" style="position: sticky;">
    <div class="sticky-top">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
            <i class="fas fa-paw mr-2 cat-paw-icon"></i>
            <span class="sidebar-brand-text">PETSHOP</span>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="index.php">
                <i class="fas fa-fw fa-home"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Menu -->
        <li class="nav-item active">
            <a class="nav-link" href="makanan.php">
                <i class="fas fa-utensils"></i>
                <span>Data Makanan</span>
            </a>
        </li>

        <li class="nav-item active">
            <a class="nav-link" href="obat.php">
                <i class="fas fa-pills"></i>
                <span>Data Obat</span>
            </a>
        </li>

        <li class="nav-item active">
            <a class="nav-link" href="jadwal.php">
                <i class="fas fa-calendar"></i>
                <span>Data Jadwal Praktik</span>
            </a>
        </li>

        <li class="nav-item active">
            <a class="nav-link" href="pendataan_pasien.php">
                <i class="fas fa-dog"></i>
                <span>Pendataan Pasien</span>
            </a>
        </li>

        <li class="nav-item active">
            <a class="nav-link .small" href="#">
                <i class="fas fa-book"></i>
                <span> Pembukuan</span>
            </a>
            <ul class="collapse submenu" style="list-style-type: none;">
                <li>
                    <a class="nav-link exclude-link" href="pembukuan.php">
                        <i class="fas fa-calendar-day"></i>
                        <span>Harian</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link exclude-link" href="mingguan.php">
                        <i class="fas fa-calendar-week"></i>
                        <span>Mingguan</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link exclude-link" href="Bulanan.php">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Bulanan</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link exclude-link" href="tahunan.php">
                        <i class="fas fa-calendar-check"></i>
                        <span>Tahunan</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0 sidebar-toggler" id="sidebarToggle"></button>
        </div>
    </div>
</ul>

<script type="text/javascript">

    document.querySelectorAll('.nav-link').forEach(link => {
    if(link.href === window.location.href){
        link.setAttribute('aria-current', 'page')
    }
    })
    
    document.addEventListener("DOMContentLoaded", function(){
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.querySelector('.sidebar-brand').classList.toggle('collapsed');
        });

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
                        var opened_submenu = parentEl.parentElement.querySelector('.submenu.show');
                        if(opened_submenu){
                            new bootstrap.Collapse(opened_submenu);
                        }
                    }
                }
            });
        });
    });
</script>

