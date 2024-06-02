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
                                    <th>product</th>
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
                                <?php foreach($product_list as $product_lunafrost) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $product->category; ?></td>
                                        <td><?= $product->slug_product; ?></td>
                                        <td><?= $product->gender; ?></td>
                                        <td><?= $product->product_name; ?></td>
                                        <td><?= $product->description; ?></td>
                                        <td><?= $product->size; ?></td>
                                        <td><?= $product->price; ?></td>
                                        <td><?= $product->stock; ?></td>
                                        <td><?= $product->image; ?></td>
                                        <td><?= date('d/m/Y H:i:s', strtotime($product->created_at)); ?></td>
                                        <td><?= date('d/m/Y H:i:s', strtotime($product->updated_at)); ?></td>
                                        <td width="10%" class="text-center">
                                            <button type="button" class="btn btn-success btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#editModal<?= $product->product_id;?>"><i class="fas fa-edit"></i> Edit</button>
                                            <button type="button" class="btn btn-danger btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $product->product_id;?>"><i class="fas fa-trash-alt"></i> Delete</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
