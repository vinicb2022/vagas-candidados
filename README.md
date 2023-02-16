# vinicius-avanz
Teste Prático Vinícius Castello Branco - Avanz Tecnologia

Projeto realizado em Laravel e Docker 

# docker-compose up -d nginx mysql phpmyadmin
Comando para rodar os containers

-- O projeto possui um sistema de autenticação com permissões para dois tipos de usuários (Anunciantes e Candidatos)

-- Os anunciantes possuem acesso aos CRUD's de vagas e candidatos, com todas as funcionalidades de lista, criar, editar e deletar. Na visualização das vagas eles conseguem ver os dados e fazer a visualização do perfil dos candidatos que se aplicaram a cada vaga

-- Os candidatos possuem acesso a tela de criação de perfil de candidato para si próprio e para a tela de vagas, onde ele pode se candidatar as vagas disponíveis.

-- O sistema possui um sistema de relacionamento entre usuários e candidatos e permissões

# php artisan php artisan db:seed
Comando para rodar as seeds
-- Foram criadas seeds para alimentação das tabelas (tipos_vagas e locais_vagas)



