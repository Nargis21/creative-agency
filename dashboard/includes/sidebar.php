<aside class="left-sidebar sidebar-light" id="left-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
        <!-- Aplication Brand -->
        <div class="app-brand">
            <a href="../frontend/index.php">
                <img src="https://img.icons8.com/fluency/48/null/idea.png" />
                <span class="brand-name fw-bold">Creative Agency</span>
            </a>
        </div>
        <!-- begin sidebar scrollbar -->
        <div class="sidebar-left" data-simplebar style="height: 100%;">
            <!-- sidebar menu -->
            <ul class="nav sidebar-inner text-white" id="sidebar-menu">
                <?php
                if (!isset($_SESSION['userType'])) : ?>
                    <li>
                        <a class="sidenav-item-link" href="placeOrder.php">
                            <img width="15%" src="https://img.icons8.com/ios-glyphs/30/null/shopping-cart--v1.png" />
                            <span class="nav-text pl-3">Place Order</span>
                        </a>
                    </li>
                    <li>
                        <a class="sidenav-item-link" href="myService.php">
                            <img class="ml-2" width="10%" src="https://img.icons8.com/ios-filled/50/null/bulleted-list.png" />
                            <span class="nav-text pl-3">My Order</span>
                        </a>
                    </li>
                    <li>
                        <a class="sidenav-item-link" href="addReview.php">
                            <img class="ml-2" src="https://img.icons8.com/material-rounded/24/null/filled-chat.png" />
                            <span class="nav-text pl-3">Add Review</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php
                if (isset($_SESSION['userType'])) : ?>
                <li>
                        <a class="sidenav-item-link" href="manageOrder.php">
                            <img class="ml-1" width="14%" src="https://img.icons8.com/ios-glyphs/30/null/shopping-cart--v1.png" />
                            <span class="nav-text pl-3">Manage Order</span>
                        </a>
                    </li>
                <li>
                    <a class="sidenav-item-link" href="addService.php">
                        <img class="ml-2" src="https://img.icons8.com/material-rounded/24/null/plus-math--v1.png" />
                        <span class="nav-text pl-3">Add Service</span>
                    </a>
                </li>
                <li>
                    <a class="sidenav-item-link" href="manageService.php">
                    <img class="ml-2" width="13%" src="https://img.icons8.com/ios-glyphs/30/null/todo-list--v1.png"/>
                        <span class="nav-text pl-2">Manage Service</span>
                    </a>
                </li>
                <li>
                        <a class="sidenav-item-link" href="manageReview.php">
                            <img class="ml-2" src="https://img.icons8.com/material-rounded/24/null/filled-chat.png" />
                            <span class="nav-text pl-3">Manage Review</span>
                        </a>
                    </li>
                <li>
                    <a class="sidenav-item-link" href="userPanel.php">
                        <img class="ml-2" src="https://img.icons8.com/ios-glyphs/30/null/admin-settings-male.png" />
                        <span class="nav-text pl-2">User Panel</span>
                    </a>
                </li>
                <?php endif; ?>
            </ul>

        </div>
    </div>
</aside>