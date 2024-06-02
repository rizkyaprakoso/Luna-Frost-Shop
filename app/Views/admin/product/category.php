<?= $this->extend('admin/layout/template') ?>

<?= $this->Section('content'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?= $title; ?></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Dashboard</a></li>
                <li class="breadcrumb-item active"><?= $title; ?></li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Product List
                        </div>

                        <div class="card-body">
                            <button type="button" class="btn btn-primary btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#addModal">
                                <i class="fas fa-plus"></i> Add Product
                            </button>

                            <!--a notification for succesfully add product -->
                            <?php if(session('success')) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session('success'); ?>
                                </div>
                            <?php endif; ?>

                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Category Name</th>
                                        <th>Gender</th>
                                        <th>Product Name</th>
                                        <th>Description</th>
                                        <th>Size</th>
                                        <th>Price</th>
                                        <th>Stock</th>
                                        <th>Image</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach($category_list as $category) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $category->category_name; ?></td>
                                            <td><?= $category->gender; ?></td>
                                            <td><?= $category->product_name; ?></td>
                                            <td><?= $category->description; ?></td>
                                            <td><?= $category->size; ?></td>
                                            <td><?= $category->price; ?></td>
                                            <td><?= $category->stock; ?></td>
                                            <td><?= $category->image; ?></td>
                                            <td><?= date('d/m/Y H:i:s', strtotime($category->created_at)); ?></td>
                                            <td><?= date('d/m/Y H:i:s', strtotime($category->updated_at)); ?></td>
                                            <td width="10%" class="text-center">
                                                <button type="button" class="btn btn-success btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#editModal<?= $category->product_id;?>"><i class="fas fa-edit"></i> Edit</button>
                                                <button type="button" class="btn btn-danger btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $category->product_id;?>"><i class="fas fa-trash-alt"></i> Delete</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </main>

        <!-- Modal Add Product-->
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus"></i> Add Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('category-list/add') ?>" method="POST">
                            <?= csrf_field() ?>

                            <div class="mb-3">
                                <label for="category_name">Category Name</label>
                                <input type="text" name="category_name" id="category_name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Gender</label><br>
                                <input type="radio" id="male" name="gender" value="Male" required>
                                <label for="male">Male</label><br>
                                <input type="radio" id="female" name="gender" value="Female" required>
                                <label for="female">Female</label><br>
                            </div>
                            <div class="mb-3">
                                <label for="product_name">Product Name</label>
                                <input type="text" name="product_name" id="product_name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="description">Description</label>
                                <input type="text" name="description" id="description" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="size">Size</label>
                                <input type="text" name="size" id="size" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="price">Price</label>
                                <input type="text" name="price" id="price" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="stock">Stock</label>
                                <input type="text" name="stock" id="stock" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary btn-sm">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--Modal Edit Product -->
        <?php foreach($category_list as $category) : ?>
            <div class="modal fade" id="editModal<?= $category->product_id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit"></i> Edit Product Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('category-list/edit/'.$category->product_id) ?>" method="POST">
                                <?= csrf_field() ?>

                                <input type="hidden" name="_method" value="PUT">
                                <div class="mb-3">

                                    <label for="category_name">Category Name</label>
                                    <input type="text" name="category_name" id="category_name" class="form-control" value="<?= $category->category_name?>" required>
                                </div>
                                <div class="mb-3">
                                    <label>Gender</label><br>
                                    <input type="radio" id="male" name="gender" value="Male" value="<?= $category->gender?>" required>
                                    <label for="male">Male</label><br>
                                    <input type="radio" id="female" name="gender" value="Female" value="<?= $category->gender?>" required>
                                    <label for="female">Female</label><br>
                                </div>
                                <div class="mb-3">
                                    <label for="product_name">Product Name</label>
                                    <input type="text" name="product_name" id="product_name" class="form-control" value="<?= $category->product_name?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="description">Description</label>
                                    <input type="text" name="description" id="description" class="form-control" value="<?= $category->description?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="size">Size</label>
                                    <input type="text" name="size" id="size" class="form-control" value="<?= $category->size?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="price">Price</label>
                                    <input type="text" name="price" id="price" class="form-control" value="<?= $category->price?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="stock">Stock</label>
                                    <input type="text" name="stock" id="stock" class="form-control" value="<?= $category->stock?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="image">Image</label>
                                    <input type="file" name="image" id="image" class="form-control" value="<?= $category->image?>" >
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary btn-sm">Change</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <!--Modal Delete Product -->
        <?php foreach($category_list as $category) : ?>
            <div class="modal fade" id="deleteModal<?= $category->product_id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-danger text-white">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-trash-alt"></i> Delete Product Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('category-list/delete/'.$category->product_id) ?>" method="POST">
                                <?= csrf_field() ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <p>Are You Sure Want To Delete This Product : <?= $category->product_name;?>?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?= $this->endSection() ?>
