# Walls & Birds Web

## Services
### Frontend

Vue3

### Backend

PayloadCMS with mongoDB database

### Newsletter System

listmonk with PostgreSQL database

## Setup Dev Environment

start listmonks database:
```
docker compose -f docker-compose.ymal -f docker-compose.development.yaml up -d listmonk_db
```

initialize listmonks database:
```
docker compose -f docker-compose.yaml -f docker-compose.development.yaml run --rm listmonk ./listmonk --install
```

start all services:
```
docker compose -f docker-compose.ymal -f docker-compose.development.yaml up -d
```

## Deployment

create network 'net' using `docker network create net`

start listmonks database:
```
docker compose -f docker-compose.yaml -f docker-compose.production.yaml up -d listmonk_db
```

initialize listmonks database:
```
docker compose -f docker-compose.yaml -f docker-compose.production.yaml run --rm listmonk ./listmonk --install
```

Run all services:
```
docker compose -f docker-compose.yaml -f docker-compose.production.yaml run --rm listmonk ./listmonk --install
```

## Migration

### Old Websites Concerts data

Import the old data to the `old_db` mysql database.

```
# terminal in the mysql container
docker exec -it old_db sh

# log into mysql as root
mysql -u root -p

# load backup
> use shows;
> source /share/DB2613259-2023-01-20.sql 
```

### PostgreSQL Database (listmonk & nextcloud)

#### Export

```
docker exec -i pg_container_name /bin/bash -c "PGPASSWORD=pg_password pg_dump --username pg_username database_name" > /desired/path/on/your/machine/dump.sql
```

#### Import

```
docker exec -i pg_container_name /bin/bash -c "PGPASSWORD=pg_password psql --username pg_username database_name" < /path/on/your/machine/dump.sql
```