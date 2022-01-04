up:
	docker compose up -d
build:
	docker compose build --no-cache --force-rm
remake:
	@make destroy
	@make up
stop:
	docker compose stop
down:
	docker compose down --remove-orphans
restart:
	@make down
	@make up
destroy:
	docker compose down --rmi all --volumes --remove-orphans
destroy-volumes:
	docker compose down --volumes --remove-orphans
ps:
	docker compose ps
logs:
	docker compose logs
bash:
	docker compose exec ansible-container bash
check:
	docker compose exec ansible-container bash -c 'ansible-playbook -i inventory.txt setup.yml --syntax-check'
run:
	docker compose exec ansible-container bash -c './logs/0_rotate.sh;ansible-playbook -i inventory.txt setup.yml'
run-v:
	docker compose exec ansible-container bash -c './logs/0_rotate.sh;ansible-playbook -v -i inventory.txt setup.yml'
run-vvv:
	docker compose exec ansible-container bash -c './logs/0_rotate.sh;ansible-playbook -vvv -i inventory.txt setup.yml'
dry-run:
	docker compose exec ansible-container bash -c './logs/0_rotate.sh;ansible-playbook -i inventory.txt setup.yml -C'