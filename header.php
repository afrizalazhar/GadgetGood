    <div class="wait overlay">
        <div class="loader"></div>
    </div>
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form onsubmit="return false" id="login">
                        <div class="panel-footer"><div class="alert alert-danger" role="alert" id="e_msg" style="display: none"></div></div>
                        <div class="mb-3">
                            <label for="loginEmail" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="loginEmail" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="loginPassword" name="password">
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-outline-success">Login</button>
                        </div>
                    </form>
                    <small>Don't have an account ? <a href="customer_registration.php?register=1">Register here</a></small>
                    
                </div>
            </div>
        </div>
    </div>
    <header class="bg-light shadow-sm navbar-sticky">
        <div class="navbar navbar-expand-lg navbar-light">
            <div class="container"><a class="navbar-brand d-none d-sm-block me-4 order-lg-1" href="index.php"><img
                        src="assets/logo-long.png" width="142" alt="Gadget Goods"></a><a
                    class="navbar-brand d-sm-none me-2 order-lg-1" href="index.php"><img src="assets/logo-icon.png"
                        width="74" alt="Gadget Goods"></a>
                <div class="navbar-toolbar d-flex align-items-center order-lg-3">
                    <a href="cart.php" class="nav-link btn btn-outline-success mx-2 btn-nav position-relative">
                        <i class="fa fa-cart-shopping text-success"></i>
                        <span class="position-absolute top-1 mt-1 start-100 translate-middle badge rounded-pill bg-danger">
                            99+
                            <span class="visually-hidden">unread messages</span>
                        </span>
                    </a>
                    <a href="profile.php" class="nav-link btn btn-outline-success mx-2 btn-nav"><i class="fa fa-user-circle text-success"></i></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarCollapse"><span class="navbar-toggler-icon"></span></button>
                        <?php 
                        if(isset($_SESSION["uid"])){ ?>
                            <a href="logout.php" class="btn btn-success btn-shadow">
                            <i class="fa-solid fa-right-from-bracket me-2"></i>Logout</a>
                            
                        <?php } else { ?> 
                            <button class="btn btn-success btn-shadow" data-bs-toggle="modal" data-bs-target="#loginModal">
                            <i class="ci-cart me-2"></i>Sign In / Sign Up</button>
                        <?php } ?>
                </div>
                <div class="collapse navbar-collapse me-auto order-lg-2" id="navbarCollapse">
                    <hr class="my-3">
                    <!-- Primary menu-->
                    <ul class="navbar-nav">
                        <li class="nav-item active"><a class="nav-link" href="index.php">Home</a>
                        </li>

                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">Categories</a>
                            <ul class="dropdown-menu" id="dropdown-categories">
                            </ul>
                        </li>
                    </ul>
                    </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
<script type="text/javascript">
	$.ajax({
		url: '<?php echo BASE_URL ?>/data/get_categories.php',
		method: 'POST',
		dataType: 'xml',
		success: function(data) {
            $dropdownCategories = $('#dropdown-categories');
            $(data).find('category').each(function() {
                $category_content = $('<li><a class="dropdown-item" href="<?php echo BASE_URL ?>/product_catalog.php?category='+$(this).find('id').text()+'">'+$(this).find('name').text()+'</a></i>');
                $dropdownCategories.append($category_content);
            })
        },
        error: function() {
            alert('Error loading XML data');
        }
	})
</script>