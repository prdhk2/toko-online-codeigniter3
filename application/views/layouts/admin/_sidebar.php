        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="pt-4">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('admin/dashboard'); ?>" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i>
                            <span class="hide-menu">Dashboard</span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('admin/product/add'); ?>" aria-expanded="false"><i class="mdi mdi-view-list"></i>
                            <span class="hide-menu">Add Product</span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('admin/category/add'); ?>" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i>
                            <span class="hide-menu">Add Category</span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('admin/product/index'); ?>" aria-expanded="false"><i class="mdi mdi-table"></i>
                            <span class="hide-menu">Table Product</span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('admin/category/index'); ?>" aria-expanded="false"><i class="mdi mdi-table"></i>
                            <span class="hide-menu">Table Category</span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-web"></i>
                            <span class="hide-menu">Setting Website </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?= base_url('websetting/index'); ?>" class="sidebar-link"><i
                                            class="mdi mdi-note-outline"></i><span class="hide-menu"> Edit Banner
                                        </span></a></li>
                                <li class="sidebar-item"><a href="<?= base_url('admin/promo'); ?>" class="sidebar-link"><i
                                            class="mdi mdi-note-plus"></i><span class="hide-menu"> Edit Promos
                                        </span></a></li>
                            </ul>
                        </li>
                        
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-shopping"></i><span
                                    class="hide-menu">Orders </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?= base_url('neworders/newOrders'); ?>" class="sidebar-link">
                                    <i class="mdi mdi-emoticon"></i><span class="hide-menu"> New Order </span></a>
                                </li>
                                <li class="sidebar-item"><a href="<?= base_url('neworders/paidOrders'); ?>" class="sidebar-link">
                                    <i class="mdi mdi-emoticon-cool"></i><span class="hide-menu"> Paid Orders</span></a>
                                </li>
                                <li class="sidebar-item"><a href="#" class="sidebar-link">
                                    <i class="mdi mdi-emoticon-cool"></i><span class="hide-menu"> Shipping</span></a>
                                </li>
                                <li class="sidebar-item"><a href="<?= base_url('neworders/deliveredOrders'); ?>" class="sidebar-link">
                                    <i class="mdi mdi-emoticon-cool"></i><span class="hide-menu"> Shipped</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url(''); ?>" aria-expanded="false"><i class="mdi mdi-eye"></i>
                            <span class="hide-menu">View Store</span></a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->