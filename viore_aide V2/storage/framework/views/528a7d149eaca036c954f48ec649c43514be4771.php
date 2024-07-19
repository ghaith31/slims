<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commander</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .category-button,
        .product-button {
            display: inline-block;
            padding: 0.5rem 1rem;
            margin: 0.5rem;
            border: none;
            border-radius: 4px;
            background-color: #f8f9fa;
            color: #212529;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }
        .category-button:hover,
        .product-button:hover {
            background-color: #e2e6ea;
            transform: scale(1.05);
        }
        .subcategory-square {
            width: 150px;
            height: 136px;
            background-color: #f8f9fa;
            padding: 10px;
            margin: 5px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border: 2px solid #343a40;
            transition: background-color 0.3s, transform 0.3s;
        }
        .subcategory-square:hover {
            background-color: #e2e6ea;
            transform: scale(1.05);
        }
        .subcategory-square img {
            max-width: 100%;
            max-height: 100%;
            border-radius: 5px;
        }
        #order-table {
            margin-top: 2%;
        }
        .total-row {
            font-weight: bold;
        }
        .formulaire {
           left: 0 !important;
        }
        .bg-red-700 {
            background-color: #AF2B1D !important;
        }
        .container {
            margin-bottom: 3%;
        }
        .navbar {
            padding: 10px 20px;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
        }
    </style>
</head>

<body>
    <?php if(session('success')): ?>
<div class="alert alert-success mt-3">
    <?php echo e(session('success')); ?>

</div>
<?php endif; ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="sidebar p-3 border rounded shadow-sm bg-light">
                    <a href="/ordres" class="lien"> Annuler</a>
                    <a href="/admin/profil" class="lien">Edit Profil</a>
                    <form action="<?php echo e(route('logout1')); ?>" method="POST" style="display: inline;">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-link" style="color:red; padding: 0; border: none; background: none;">Logout</button>
                    </form>
                    <select name="payment_method" id="payment_method" required>
                        <option value="espece">Espece</option>
                        <option value="tpe">TPE</option>
                    </select>
                    
                    <h2 style="text-align: center;">Slims</h2>
                    <div class="formulaire">
                        <form action="<?php echo e(route('caisse.save')); ?>" method="post" onsubmit="return validateTotalPrice()">
                            <?php echo csrf_field(); ?>
                            <div class="form-group mb-3">
                                <label for="branch" class="form-label">Branche</label>
                                <select id="branch" name="branch" class="form-select">
                                    <option value="branch1">Branche 1</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="order-type" class="form-label">Type de commande</label>
                                <select id="type_commande" name="type_commande" class="form-select">
                                    <option value="À emporter">À emporter</option>
                                    <option value="Livraison">Livraison</option>
                                    <option value="Sur Place">Sur place</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="customer" class="form-label">Client</label>
                                <input type="text" id="client" name="client" placeholder="Nom du client" class="form-control" value="Nom">
                            </div>
                            <div class="form-group mb-3">
                                <label for="due-at" class="form-label">Date :</label>
                                <input type="datetime-local" id="heure_arrivee" name="heure_arrivee" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="receipt-notes" class="form-label">Notes de réception :</label>
                                <textarea id="notes_ticket" name="notes_ticket" placeholder="Entrez les notes de réception" class="form-control"></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="kitchen-notes" class="form-label">Notes de cuisine :</label>
                                <textarea id="notes_cuisine" name="notes_cuisine" placeholder="Entrez les notes de cuisine" class="form-control"></textarea>
                            </div>
                          
                            <div class="table-responsive mb-3">
                                <table class="table table-bordered">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>Article</th>
                                            <th>Quantité</th>
                                            <th>Prix</th>
                                        </tr>
                                    </thead>
                                    <tbody id="selected-products-body" class="bg-white">
                                        <?php
                                            $totalPrice = 0;
                                        ?>
                                        <?php if(session('cass')): ?>
                                            <?php $__currentLoopData = session('cass'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productId => $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $quantity = $cartItem['quantity'];
                                                    $productPrice = $cartItem['product']->Prix;
                                                    $totalPrice += $productPrice * $quantity;
                                                ?>
                                                <tr>
                                                    <td ><?php echo e($cartItem['product']->Nom); ?></td>
                                                    <td class="quantity-value"><?php echo e($quantity); ?></td>
                                                    <td class="cart-item-price"><?php echo e($productPrice); ?> TND</td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr class="total-row">
                                            <td colspan="2">Total</td>
                                            <td class="total-price"><?php echo e($totalPrice); ?> TND</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <?php if(session('cass')): ?>
                                <?php $__currentLoopData = session('cass'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productId => $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <input type="hidden" name="produits[<?php echo e($productId); ?>]" value="<?php echo e(session('clicks')[$productId] ?? 0); ?>">
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            <input type="hidden" name="total_price" id="total_price" value="<?php echo e($totalPrice); ?>">
                            <button id="submit-orderButton" class="bg-red-700 text-white font-bold py-2 px-4 rounded w-100" type="submit">
                                Envoyer la commande
                            </button>
                            
                        </form>
                        <?php if($errors->any()): ?>
                        <div class="alert alert-danger mt-3">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="d-flex justify-content-center flex-wrap categorie">
                    <?php $__currentLoopData = $produits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <form action="<?php echo e(route('caisse.add')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="productId" value="<?php echo e($produit->id); ?>">
                        <button type="submit" class="subcategory-square category-button" data-prix="<?php echo e($produit->Prix); ?>">
                            <?php echo e($produit->Nom); ?>

                            <div>
                                <img src="<?php echo e($produit->photo); ?>" width="100px" height="100px" class="img-fluid">
                            </div>
                        </button>
                    </form>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div id="order-table" class="table-responsive mt-3">
                    <h2 style="text-align: center;color:#AF2B1D;">Commandes Traités</h2>
                    <table class="table table-striped table-bordered">
                        <?php if(is_array($cmds) || is_object($cmds)): ?>
                        <?php $__currentLoopData = $cmds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $commande): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div id="order-table" class="table-responsive mt-3">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>command n° <?php echo e($index + 1); ?></th>
                                            <th>Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody id="order-table-body">
                                        <?php
                                            // Decode the JSON string to an associative array
                                            $produits = json_decode($commande->produits, true);
                                        ?>
                                        <?php if(is_array($produits) || is_object($produits)): ?>
                                            <?php $__currentLoopData = $produits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produitId => $quantite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $produit = App\Models\Produit::find($produitId);
                                                ?>
                                                <tr>
                                                    <td><?php echo e($produit ? $produit->Nom : 'Product not found'); ?></td>
                                                    <td><?php echo e($quantite); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="2">No products found for this commande.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <p>No commands available</p>
                    <?php endif; ?> 
        </div>
    </div>
    <!-- Inclusion de jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function addProductToTable(productName, quantity, price) {
            var newRow = '<tr><td>' + productName + '</td><td>' + quantity + '</td><td>' + price + ' TND</td></tr>';
            $('#selected-products-body').append(newRow);
        }

        function updateTotalPrice(newTotal) {
            $('#total-price').text(newTotal.toFixed(2) + ' TND');
        }

        $('#submit-orderButton').click(function() {
            var totalPrice = parseFloat($('#total-price').text().replace(' TND', ''));
            $('#total').val(totalPrice);
        });

        function updateCartSubtotal() {
            var totalPrice = 0;
            $('#selected-products-body tr').each(function() {
                var price = parseFloat($(this).find('.cart-item-price').text().trim().replace(' TND', ''));
                var quantity = parseInt($(this).find('.quantity-value').text().trim());
                totalPrice += price * quantity;
            });
            $('#total-price').text(totalPrice.toFixed(2) + ' TND');
        }

        function updateCartQuantity(productId, action) {
            var quantityElement = $('#quantity_' + productId);
            var currentQuantity = parseInt(quantityElement.text());
            var newQuantity;
            if (action === 'minus') {
                newQuantity = Math.max(currentQuantity - 1, 0);
            } else if (action === 'plus') {
                newQuantity = currentQuantity + 1;
            }
            quantityElement.text(newQuantity);

            var priceElement = $('#price_' + productId);
            var price = parseFloat(priceElement.text().replace(' TND', ''));
            var totalPriceElement = $('#total-price');
            var totalPrice = parseFloat(totalPriceElement.text().replace(' TND', ''));
            var priceDifference = (newQuantity - currentQuantity) * price;
            var newTotalPrice = totalPrice + priceDifference;

            totalPriceElement.text(Math.max(newTotalPrice, 0).toFixed(2) + ' TND');

            updateCartSubtotal();
        }

        $(document).ready(function() {
            updateCartSubtotal();
        });

        
    </script>
    <script>
        // Obtenez la date et l'heure actuelles
        var now = new Date();
    
        // Formattez la date et l'heure pour le champ datetime-local
        var year = now.getFullYear();
        var month = (now.getMonth() + 1).toString().padStart(2, '0');
        var day = now.getDate().toString().padStart(2, '0');
        var hours = now.getHours().toString().padStart(2, '0');
        var minutes = now.getMinutes().toString().padStart(2, '0');
        var datetime = ${year}-${month}-${day}T${hours}:${minutes};
    
        // Définissez la valeur dans le champ datetime-local
        document.getElementById("heure_arrivee").value = datetime;
    </script>
    
</body>
</html><?php /**PATH C:\viore_aide\resources\views/admin/takeorder.blade.php ENDPATH**/ ?>