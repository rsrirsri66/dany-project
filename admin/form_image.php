<!-- Modal -->

<div class="modal fade" id="addFoodModal" tabindex="-1" aria-labelledby="addFoodModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="foodModalLabel">Add New Image Item</h5>
                <button type="button" class="btn-close" id="modalCloseBtn" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="card-body p-4">
                <form class="row g-3 needs-validation" id="addFoodForm" enctype="multipart/form-data" novalidate>
                    <input type="hidden" name="hdnAction" value="addFood">

                    <!-- Food Name -->

                    <div class="col-md-12">
                    <label for="product" class="form-label">Heading <span class="text-danger">*</span></label>
                    <div class="position-relative input-icon">
                        <select class="form-select" name="product_id" id="product" required>
                            <option value="">-- Select Heading --</option>
                            <?php
                            $products = $conn->query("SELECT id, heading FROM heading WHERE status='Active' ORDER BY heading ASC");
                            while($row = $products->fetch_assoc()):
                            ?>
                                <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['heading']) ?></option>
                            <?php endwhile; ?>
                        </select>
                        <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-package'></i></span>
                        <div class="invalid-feedback">Please select a Heading.</div>
                    </div>
                </div>

                    <!-- <div class="col-md-12">
                        <label for="name" class="form-label">Model Name <span class="text-danger">*</span></label>
                        <div class="position-relative input-icon">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" required />
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-bowl-hot'></i></span>
                            <div class="invalid-feedback">Please enter a name.</div>
                        </div>
                    </div> -->

                    <!-- Food Type -->
                    <!-- <div class="col-md-6">
                        <label for="food_type" class="form-label">Food Type <span class="text-danger">*</span></label>
                        <div class="position-relative input-icon">
                            <select class="form-control" name="food_type" id="food_type" required>
                                <option value="">Select Food Type</option>
                                <option value="Veg">Veg</option>
                                <option value="Non-Veg">Non-Veg</option>
                            </select>
                            <div class="invalid-feedback">Please select a food type.</div>
                        </div>
                    </div> -->

                    <!-- Category -->
                    <!-- <div class="col-md-6">
                        <label for="category" class="form-label">Category <span class="text-danger">*</span></label>
                        <div class="position-relative input-icon">
                            <select class="form-control" name="category" id="category" required>
                                <option value="">Select Category</option>
                                <option value="Vegetables">Vegetables</option>
                                <option value="Fruits">Fruits</option>
                             
                            </select>
                            <div class="invalid-feedback">Please select a category.</div>
                        </div>
                    </div> -->

                    <!-- Price -->
                    <!-- <div class="col-md-6">
                        <label for="price" class="form-label">Price <span class="text-danger">*</span></label>
                        <div class="position-relative input-icon">
                            <input type="number" class="form-control" name="price" id="price" placeholder="Enter Price" required>
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-dollar-circle'></i></span>
                            <div class="invalid-feedback">Please enter a valid price.</div>
                        </div>
                    </div> -->

                    <!-- Food Image Upload -->
                    <div class="col-md-6">
                        <label for="food_image" class="form-label">Image <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="food_image" id="food_image" accept="image/*" required>
                        <div class="invalid-feedback">Please upload a image.</div>
                    </div>

                    <!-- Buttons -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Image</button>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end modal dialog -->
</div> <!-- end Modal Fade -->

<!-- Add the Salary modal -->
 <!-- Modal -->



<!-- Edit Modal -->
<div class="modal fade" id="editFoodModal" tabindex="-1" aria-labelledby="editFoodModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editFoodModalLabel">Edit Image Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="card-body p-4">
                <form class="row g-3 needs-validation" id="editFoodForm" enctype="multipart/form-data" novalidate>
                    <input type="hidden" name="edit_id" id="edit_food_id"> <!-- Hidden field for food ID -->


                     <div class="col-md-12">
                    <label for="edit_product" class="form-label">Heading <span class="text-danger">*</span></label>
                    <div class="position-relative input-icon">
                        <select class="form-select" name="product_id" id="edit_product" required>
                            <option value="">-- Select Heading --</option>
                            <?php
                            $products = $conn->query("SELECT id, heading FROM heading WHERE status='Active' ORDER BY heading ASC");
                            while($row = $products->fetch_assoc()):
                            ?>
                                <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['heading']) ?></option>
                            <?php endwhile; ?>
                        </select>
                        <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-package'></i></span>
                        <div class="invalid-feedback">Please select a Heading.</div>
                    </div>
                </div>


                     <div class="col-md-12">
                        <label for="food_image_edit" class="form-label">Image <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="food_image" id="food_image_edit" accept="image/*" >
                        <div class="invalid-feedback">Please upload a image.</div>
                    </div>
 
                     <div class="mt-2" id="preview_div">
            <img src="" 
                 id="old_image" 
                 alt="Old Image" 
                 class="img-thumbnail" 
                 style="max-width:150px; height:auto;">
        </div>


                    <!-- Buttons -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update image</button>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end modal dialog -->
</div> <!-- end Modal -->

