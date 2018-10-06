# hackathon-voting-app
Blockchain Voting App for GGC Berlin Hackathon 2018


### get vote
example:
GET http://localhost:8000?vote_id=vote-1&voter_id=2

returns {"vote": "[value]"}  value of the recent vote

### get all votes
example:
GET http://localhost:8000?vote_id=vote-1

returns {"votes": ["1","2","1"]}

### create vote
POST with params vote_id, voter_id, vote