Docker config:

docker config list

->Criar uma REDE:
docker network create REDE1
docker network list

->Criar um novo VOLUME:
docker volume create VOL1

->Baixar a imagem do MariaDB e criar um container:
docker run -d --name mariadb -h db -v VOL1:/var/lib/mysql -h db --network REDE1 --env MARIADB_USER=user --env MARIADB_PASSWORD=secret --env MARIADB_ROOT_PASSWORD=secret  mariadb:latest

->Baixar a imagem do phpMyAdmin e criar um container no docker para ele:
docker run --name myadmin -h myadmin --network REDE1  -d -e PMA_HOST=db -p 8080:80 phpmyadmin


->Verificar dados dos conteiner criados
docker inspect

->Listar todos os containers utilizados:
docker container list -a