# Smarter.Vote
Blockchain based voting application to increase awareness of current legislation by allowing you to make a symbolic vote and comparing the data to actual votes by elected officials and political parties.

<!-- Image? -->

problem: current polling is not always transparent or representative. Additionally it is not very accessible or interactive for certain groups of people.

solution: engage people by having an interactive system where they can learn about politics which

<!-- Image? -->

**Frontend**: ReactNative <br>
**Backend**: PHP <br>
**API**: [MultiChain - SAP Cloud Platform](https://cloudplatform.sap.com/capabilities/product-info.MultiChain-on-SAP-Cloud-Platform.c091cbd8-bb96-447a-81ca-5f5555996b02.html)


This project was built on October 6-7, 2018 as part of the [Geek Girls Carrots](http://www.hacklikeagirl.co/) Berlin FinTech & Blockchain Hackathon.

## How It Works
... 

<!-- Image? -->

## Requirements for Development
* SAP API key
* point 2 ...

## Quickstart
Here's how you can get up and running with this project.

1. Clone this repository
```
git clone https://github.com/lwrocks/hackathon-voting-app
cd hackathon-voting-app/
```
2. Install dependencies ?
```
$
```

3. Another step...
```
$
```

4. Run the project locally
```
$
```

## Use
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

### create new stream
POST  HTTP/1.1

Host: https://maas-proxy.cfapps.eu10.hana.ondemand.com/d0338c3d-2ef0-4127-b55d-2faca86a1ce5/rpc

(HEADER) apikey: your API Key

(BODY) {"method": "create", "params": ["stream", "vote-1", true]}


## What's Next?
While we're definitely proud of what we accomplished in less than 36 hours, we have big dreams for Smarter.Vote. Some of the future features we envision for this project include:

* point 1

* point 2

* point 3


## The Team Behind Smarter.Vote
[Andrej Guran](https://github.com/andrejguran), 
[Carolin Gümpel](https://github.com/gluecksbaerchi),
[Ewa Szyszska](https://github.com/EwaSzyszka), 
[Laura Correa](https://github.com/lcorr8), 
[Laurel Wright](https://github.com/lwrocks), 
[Sofia Camussi](https://github.com/sofiacamussi)
