/**
 * Script file for transactions
 */
 

/**
 *Admin add or remove points to wallet
 * @param {org.acme.BitPoint.adminUpdatePoints} adminUpdatePoints - admin add or remove points to the wallet
 * @transaction
 */
function adminUpdatePoints(adminUpdatePoints) {
	var pointsToAdd = adminUpdatePoints.points;
  	var targetwallet = adminUpdatePoints.wallet;
  	
    if(targetwallet != null){
		targetwallet.pointBalance+= pointsToAdd;
    }
  	
  return getAssetRegistry('org.acme.BitPoint.Bitwallet')
  	.then(function(BitwalletRegistry) {
    return BitwalletRegistry.update(targetwallet)
  });
  
  	
  
  
}

/**
 * Merchant create Reward
 * @param {org.acme.BitPoint.merchantCreateReward} merchantCreateReward - Merchant create Reward
 * @transaction
 */
function merchantCreateReward(create) {
	
	var factory = getFactory();
    var reward = factory.newResource('org.acme.BitPoint', 'Reward', create.rewardsId);
	reward.name = create.name;
	reward.description = create.description;
	reward.pointsAmount = create.pointsAmount;
	reward.startDate = create.startDate;
    reward.expiryDate = create.expiryDate;
	reward.quantity = create.quantity;
	reward.merchant = create.list.owner;
	
	var rewards = create.list;
	
	if(rewards.rewards == null) {
		rewards.rewards = [];
	}
	
	rewards.rewards.push(reward);
	
	return getAssetRegistry('org.acme.BitPoint.RewardsList')
		.then(function(rewardsListRegistry) {
			
			getAssetRegistry('org.acme.BitPoint.Reward')
				.then(function(rewardsRegistry) {
					return rewardsRegistry.add(reward);
				});
			
			return rewardsListRegistry.update(rewards);
		});
}

/**
 * Merchant delete rewards
 * @param {org.acme.BitPoint.merchantDeleteReward} merchantDeleteReward - Merchant delete reward
 * @transaction
 */
function merchantDeleteReward(del) {
	
	var reward = del.reward;
	var rewardList = del.list
	
	for(var i = 0; i < rewardList.rewards.length; i++) {
		if(rewardList.rewards[i].rewardsId == reward.rewardsId) {
			rewardList.rewards.splice(i, 1);
		}
	}
	
	  
  
	return getAssetRegistry('org.acme.BitPoint.Reward')
		.then(function(rewardRegistry) {
            
            getAssetRegistry('org.acme.BitPoint.RewardsList')
				.then(function(rewardsListRegistry) {
					return rewardsListRegistry.update(rewardList);
				});
          
			return rewardRegistry.remove(reward);
		});
	
}

/**
 *Merchant add or remove points to wallet
 * @param {org.acme.BitPoint.merchantUpdatePoints} merchantUpdatePoints - merchant add or remove points to the wallet
 * @transaction
 */
function merchantUpdatePoints(merchantUpdatePoints) {
	var pointsToAdd = merchantUpdatePoints.points;
  	var targetwallet = merchantUpdatePoints.wallet;
  	
    if(targetwallet != null){
		targetwallet.pointBalance+= pointsToAdd;
    }
  	
  return getAssetRegistry('org.acme.BitPoint.Bitwallet')
  	.then(function(BitwalletRegistry) {
    return BitwalletRegistry.update(targetwallet)
  });  
}


/**
 * User redeem rewards
 * @param {org.acme.BitPoint.memberRedeemRewards} memberRedeemRewards - Member redeem rewards
 * @transaction
 */
function memberRedeemRewards(redeem) {
	var targetWallet = redeem.wallet;
	var selectedReward = redeem.rewards;
	
	if(selectedReward.quantity > 0 && targetWallet.pointBalance >= selectedReward.pointsAmount) {
		targetWallet.pointBalance -= selectedReward.pointsAmount;
		selectedReward.quantity -= 1;

		return getAssetRegistry('org.acme.BitPoint.Bitwallet')
			.then(function(walletRegistry) {
				
				getAssetRegistry('org.acme.BitPoint.Reward')
					.then(function(rewardsRegistry) {
						return rewardsRegistry.update(selectedReward);
					});
					
				return walletRegistry.update(targetWallet);
			});
	}
	
	else {
		throw new Error('Rewards are fully redeemed');
	}
}