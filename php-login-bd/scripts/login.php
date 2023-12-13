<?php
    $error = $_SESSION['error'] ?? null;
    unset($_SESSION['error']);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-4">
            <div class="card bg-light p-5 shadown-mt-5">
                <h3>login</h3>
                <hr />
                
                <form action="?rota=login_submit" method="post">

                <div class="mb-3">
                        <label for="text_user" class="form-label">User:</label>
                        <input type="text" name="text_user" class="form-control" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="text_pass" class="form-label">Pass:</label>
                        <input type="password" name="text_pass" class="form-control" required>
                    </div>

                    <div>
                        <input type="submit" value="Enter" class="btn btn-secondary w-100">
                    </div>

                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger mt-3 p-2 text-center">
                            <?= $error ?>
                        </div>
                    <?php endif; ?>

                </form>
            </div>
        </div>
    </div>
</div>