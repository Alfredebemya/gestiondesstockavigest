<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>AviGEST - Tableau de bord</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stypesheet"  href="styles.css" >
    </head>
    <body>
    <?php include 'sidebar.php'; ?>
  <div class="main">
    <div class="topbar">
      <div>TABLEAU DE BORD</div>
      <div>🔔 Admin</div>
    </div>

    <div class="dashboard-cards">
      <div class="card">
        <h3>Ventes totales</h3>
        <p id="Prix_total">     </p>
        <small id="pourcentage_des_ventes"></small>
      </div>
      <div class="card">
        <h3>Commandes</h3>
        <p id="nbres_descommandes">   </p>
        <small>cette semaine</small>
      </div>
      <div class="card">
        <h3>Clients</h3>
        <p id="nbre_de_client">  </p>
        <small>Total des clients</small>
      </div>
      <div class="card">
        <h3>Stock critique</h3>
        <p id="stocks_bas"></p>
        <small id="produit_a-reaprovisinner"></small>
      </div>
    </div>

    <div class="warning">
      <!-- ⚠ Attention : Le stock de poulets de chair est faible (10 unités). Pensez à réapprovisionner. -->
    </div>
  </div>
  <div>
    <div>
        <h3> commandes récentes </h3>
        <button class="btn">Nouvelle commande</button>
    </div>
    <table>
      <thead>
        <tr>
          <th>#Ref</th><th>Client</th><th>Produits</th><th>Total</th><th>Date</th><th>Statut</th>
        </tr>
        <tr id="commandes">
          <!-- a charger automatiquement depuis la base de donnee AviGEST.commande -->
        </tr>
      </thead>
      <tbody>
        
      </tbody>
    </table>
  </div>
  <div>
    <h3>Prix des produits </h3>
        <button class="btn">Modifier</button>
    <table>
      <thead>
        <tr>
          <th>Produit</th><th>Type</th><th>Unité</th><th>Prix</th><th>Stock disponible</th>
        </tr>
        <tr id="prix_des_produits">
          <!--a charger automatiquement depuis la base de donnee AviGEST.prix -->
        </tr>
      </thead>
      <tbody>
        
      </tbody>
    </table>
  </div>
    </body>
</html>