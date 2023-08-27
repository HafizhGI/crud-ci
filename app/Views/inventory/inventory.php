<!-- < ?= $this->session->flashdata('message'); ?> -->
<div class="container">
    <div class="block-header">
        <div class="col-12">
            <div class="card">
                <h3 class="text-align" style="text-align: center; padding-top: 10px;">Java Inventory System</h3>
                <div class="body">
                    <a href="<?= base_url('/InventoryController/Add') ?>">
                        <button type="button" class="btn btn-primary">+ Add New Product</button>
                    </a>
                    <div class="card-box table-responsive">
                        <table id="table1" name="tabel1" class="table table-bordered  dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-center">Price (Rp.)</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>
                                <?php foreach ($list as $product) { ?>
                                    <?php $no += 1; ?>
                                    <tr>
                                        <td class="text-center"><?= $no ?></td>
                                        <td class="text-center"><?= $product->name ?></td>
                                        <td class="text-center"><?= $product->quantity ?></td>
                                        <td class="text-center"><?= $product->price ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('InventoryController/editPage/' . $product->id) ?>">
                                                <button class="btn btn-info">Edit</button>
                                            </a>
                                            <a href="<?= base_url('InventoryController/Remove/' . $product->id) ?>">
                                                <button class="btn btn-danger">Delete</button>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>