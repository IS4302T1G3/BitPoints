
/**
 * Script file for transactions
 */



/**
 *Admin add points to wallet
 * @param {org.acme.BitPoint.adminAddPoints} adminAddPoints - admin add points to the wallet
 * @transaction
 */
function adminAddPoints(adminAddPoints) {
	var pointsToAdd= adminAddPoints.points;
  	var targetwallet= adminAddPoints.wallet;
  	
  //if(wallet.walletId!=null){
  	targetwallet.pointBalance+= pointsToAdd;
  //}
  	
  return getAssetRegistry('org.acme.BitPoint.Bitwallet')
  	.then(function(BitwalletRegistry) {
    return BitwalletRegistry.update(targetwallet)
  });
  
  	
  
  
}
