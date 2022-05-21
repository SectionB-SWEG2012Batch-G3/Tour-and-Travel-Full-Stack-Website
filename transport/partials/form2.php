<div class="input-container <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                echo $stDateErr ? 'error' : 'success';
                            } ?>">
    <label for="Date">From date</label>
    <input type="datetime-local" id="St-Date" name="Date-st" value="<?php echo $stDate ? date('Y-m-d\TH:i', $stDate)  : null ?>" required>
    <i style="position: absolute;right: 80px;top:38px" class="fas fa-check-circle"></i>
    <i style="position: absolute;right: 80px;top:38px" class="fas fa-exclamation-circle"></i>
    <small><?php echo $stDateErr[0] ?? ''; ?></small>
</div>
<div class="input-container <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                echo $enDateErr ? 'error' : 'success';
                            } ?>">
    <label for="Date">To date</label>
    <input type="datetime-local" id="En-Date" name="Date-en" value="<?php echo $enDate ? date('Y-m-d\TH:i', $enDate) : null ?>" required>
    <i style="position: absolute;right: 80px;top:38px" class="fas fa-check-circle"></i>
    <i style="position: absolute;right: 80px;top:38px" class="fas fa-exclamation-circle"></i>
    <small><?php echo $enDateErr[0] ?? ''; ?></small>
</div>
<div class="input-container <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                echo $cardNumErr ? 'error' : 'success';
                            } ?>">
    <label for="credit-card">Credit card number</label>
    <input type="password" name="credit-card" id="credit-card" value="<?php echo $cardNum ? $cardNum : null ?>" placeholder="credit card number" required>
    <i class="fas fa-eye" id="<?php echo $cardNum ? 'on' : 'off' ?>"></i>
    <i class="fas fa-eye-slash" id="off"></i>
    <i class="fas fa-check-circle"></i>
    <i class="fas fa-exclamation-circle"></i>
    <small><?php echo $cardNumErr[0] ?? ''; ?></small>
</div>
<div class="input-container">
    <label for="perhour">Price/Hr.</label>
    <input type="text" id="perhour" name="perHour" value="<?php echo $pricePerH ? $pricePerH : null ?>" disabled>
    <i class="fas fa-check-circle"></i>
    <i class="fas fa-exclamation-circle"></i>
    <small></small>
</div>
<div class="input-container">
    <label for="price">Total price</label>
    <input type="text" name="price" id="price" value="<?php echo $price ? $price : null ?>" disabled>
    <i class="fas fa-check-circle"></i>
    <i class="fas fa-exclamation-circle"></i>
    <small></small>
</div>

<input type="submit" id="submit-btn" name="submit" value="Create">
<input style="transform: translateX(10px);" type="reset" id="reset" name="clear" value="clear">
</form>
</fieldset>
</section>