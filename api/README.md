# Rocket League Stats API


## Commands

### Get All Players
This command will return a JSON containing basic info for all stored players

	localhost:8080/get-players


### Get All Teams
This command will return a JSON containing basic info for all stored teams

	localhost:8080/get-teams

### Get Individual Player Info
This command will return a JSON containing more detailed info for a specific player.

_id is an integer value that represents that player_

	localhost:8080/get-player-info?player-id={id}

### Get All Seasons
This command will return a JSON containing basic info for all stored teams

	localhost:8080/get-seasons
