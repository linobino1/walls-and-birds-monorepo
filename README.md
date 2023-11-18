# Walls & Birds old website

## Dev Environment

```bash
docker compose up -d
```

## Deployment

A traefik proxy is required. You can start one by running the following command:

```bash
docker compose -f docker-compose.traefik.yml up -d
```

Then, you can deploy the stack by running the following command:

```bash
docker compose -f docker-compose.production.yaml up -d
```

## Migration

### Database

Import the old data to the `DB` mysql database.

```
# terminal in the mysql container
docker exec -it <container> sh

# log into mysql as root
mysql -u root -p

# load backup
> use shows;
> source /seed/DB2613259-2023-01-20.sql 
```
