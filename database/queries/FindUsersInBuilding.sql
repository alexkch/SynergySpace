set search_path to synergy;

/* Given building ID, find all users in the building "network"

  ? is the building ID
*/

select username
from building, network
where building.n_id = network.n_id and building.b_id = '?'; 


