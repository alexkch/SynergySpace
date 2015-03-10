Schema - Synergy Space


Relations:


* Users ( username, password, name, email, type, occupation, birthdate, gender, homeaddress, phonenumber)  


* Building( b_id, n_id, address, city, country, capacity, worknumber)


* Feedback( f_id, b_id, subject, rater, feedback_rating, comments)


* BuildingRating( r_id, b_id, username, building_rating, comments)


* NetWork(n_id, username)


* Owns( owner, b_id )


* Renting( username, b_id, monthlength)


* Listed( bID, owner, startPrice, datePosted)




INTEGRITY CONSTRAINTS:


Feedback[subject] ⊆ User[username] 
Feedback[rater] ⊆ User[username] 
BuildingRating[username] ⊆ User[username] 
Network[username] ⊆ User[username] 
Renting[username] ⊆ User[username] 
Listed[owner] ⊆ User[username] 


Feedback[bID] ⊆ Building[bID] 
BuildingRating[bID] ⊆ Building[bID] 
Owns[bID] ⊆ Building[bID] 
Renting[bID] ⊆ Building[bID] 
Listed[bID] ⊆ Building[bID]  


User[type] = {owner, tenant}


Feedback[Rating] = {0~10}
Building[Rating] = {0~10}