<?php include_once 'header.php'; ?>

<div class="container mt-5">
    <h2>Edit User Details</h2>
    <form id="edit-user-detials">
        <?php if ($_SESSION['user_type'] ==  "medical_professional") { ?>
            <div class="mt-3 mb-3">
                <label for="medical-professional-name" class="form-label mb-2 fw-bold">Name</label>
                <input name="medical_professional_name" type="text" class="form-control" id="medical-professional-name" value=<?php echo $currentUserDetails[0]["medical_professional_name"]?>>
            </div>
            <div class="mt-3 mb-3">
                <label for="medical-professional-email" class="form-label mb-2 fw-bold">Email</label>
                <input name="medical_professional_email" type="email" class="form-control" id="medical-professional-email" value = <?php echo $currentUserDetails[0]["medical_professional_email"]?>>
            </div>
            <div class="mt-3 mb-3">
                <label for="medical-professional-phone" class="form-label mb-2 fw-bold">Phone</label>
                <input name="medical_professional_phone" type="tel" class="form-control" id="medical-professional-phone" value = <?php echo $currentUserDetails[0]["medical_professional_phone_number"]?>>
            </div>
            <div class="mt-3 mb-3">
                <label for="medical-professional-specialty" class="form-label mb-2 fw-bold">Specialty</label>
                <input name="medical_professional_specialty" type="text" class="form-control" id="medical-professional-specialty" value=<?php echo $currentUserDetails[0]["medical_professional_specialty"]?>>
            </div>
            <div class="mt-3 mb-3">
                <label for="medical-professional-license-number" class="form-label mb-2 fw-bold">License Number</label>
                <input name="medical_professional_license_number" type="text" class="form-control" id="medical-professional-license-number" value=<?php echo $currentUserDetails[0]["medical_professional_license_number"]?>>
            </div>
            <div class="mt-3 mb-3">
                <label for="medical-professional-role" class="form-label mb-2 fw-bold">Role</label>
                <input name="medical_professional_role" type="text" class="form-control" id="medical-professional-role" value=<?php echo $currentUserDetails[0]["medical_professional_role"]?>>
            </div>
        <?php } else { ?>
            <div class="mt-3 mb-3">
                <label for="medical-company-name" class="form-label mb-2 fw-bold">Company Name</label>
                <input name="medical_company_name" type="text" class="form-control" id="medical-company-name" value = "<?php  echo $currentUserDetails[0]["medical_company_name"]?>">
            </div>
            <div class="mt-3 mb-3">
                <label for="medical-company-email" class="form-label mb-2 fw-bold">Company Email</label>
                <input name="medical_company_email" type="email" class="form-control" id="medical-company-email" value = "<?php  echo $currentUserDetails[0]["medical_company_email"]?>">
            </div>
            <div class="mt-3 mb-3">
                <label for="medical-company-phone-number" class="form-label mb-2 fw-bold">Company Phone Number</label>
                <input name="medical_company_phone_number" type="tel" class="form-control" id="medical-company-phone-number" value = "<?php  echo $currentUserDetails[0]["medical_company_phone_number"]?>">
            </div>
            <div class="mt-3 mb-3">
                <label for="medical-company-address" class="form-label mb-2 fw-bold">Company Address</label>
                <input name="medical_company_address" type="text" class="form-control" id="medical-company-address" value = "<?php  echo $currentUserDetails[0]["medical_company_address"]?>">
            </div>
            <div class="mt-3 mb-3">
                <label for="medical-company-sector" class="form-label mb-2 fw-bold">Sector</label>
                <input name="medical_company_sector" type="text" class="form-control" id="medical-company-sector" value = "<?php  echo $currentUserDetails[0]["medical_company_sector"]?>">
            </div>
            <div class="mt-3 mb-3">
                <label for="medical-company-specialty" class="form-label mb-2 fw-bold">Specialty</label>
                <input name="medical_company_specialty" type="text" class="form-control" id="medical-company-specialty" value = "<?php  echo $currentUserDetails[0]["medical_company_specialty"]?>">
            </div>
        <?php } ?>
        <button type="submit" class="btn btn-dark mb-5">Submit</button>
    </form>
</div>



<?php include_once 'footer.php'; ?>