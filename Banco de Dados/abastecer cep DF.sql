-- Cadastro de todas as UFs do Brasil
use casalimpa;
SELECT * FROM casalimpa.tb_uf;
insert tb_uf(Sigla_UF,Nome_Estado)
values 
("AC", "Acre"),("AM", "Amazonas"), 
("AL","Alagoas"),("AP","Amapá"),
("BA","Bahia"),("CE","Ceará"),
("DF","Distrito Federal"),("ES","Espirito Santo"),
("GO","Goiás"),("MA","Maranhão");

insert tb_uf (Sigla_UF,Nome_Estado)
values 
("MT","Mato Grosso"),("MS","Mato Grosso do Sul"),
("MG","Minas Gerais"),("PA","Pará"),
("PB","Paraíba"),("PR","Paraná"),
("PE","Pernambuco"),("PI","Piauí"),
("RJ","Rio de Janeiro"),("RN","Rio Grande do Norte");

insert tb_uf (Sigla_UF,Nome_Estado)
values 
("RS","Rio Grande do Sul"),("RO","Rondônia"),
("RR","Roraima"),("SC","Santa Catarina"),
("SP","São Paulo"),("SE","Sergipe"),
("TO","Tocantins");
SELECT * FROM casalimpa.tb_uf;

-- Cadastro de todas as Cidades de Brasilia

SELECT * FROM casalimpa.tb_cidade;
insert tb_cidade (Nome_Cidade,TB_UF_Sigla_UF)
values
("Brasília","DF"),("Brazlândia","DF"),("Candangolândia","DF"),("Ceilândia","DF"),("Cruzeiro","DF"),
("Gama","DF"),("Guará","DF"),("Lago Norte","DF"),("Lago Sul","DF"),("Núcleo Bandeirante","DF");

insert tb_cidade (Nome_Cidade,TB_UF_Sigla_UF)
values
("Paranoá","DF"),("Planaltina","DF"),("Recanto das Emas","DF"),("Riacho Fundo","DF"),("Samambaia","DF"),
("Santa Maria","DF"),("São Sebastião","DF"),("Sobradinho","DF"),("Taguatinga","DF");

-- cadastro de Bairros Brasilia = 2

SELECT * FROM casalimpa.tb_bairro;
insert tb_bairro (Nome_Bairro,TB_Cidade_PK_Cidade)
values
("Asa Norte",2),("Asa Sul",2),("Campus Universitário",2),("Granja do Torto",2),("Setor Bancário Norte",2),
("Setor Bancário Sul",2),("Setor Comercial Norte",2),("Setor Comercial Sul",2),("Setor Cultural Norte",2),("Setor Cultural Sul",2);

insert tb_bairro (Nome_Bairro,TB_Cidade_PK_Cidade)
values
-- Brasilia = 2
("Setor de Autarquias Norte",2),("Setor de Autarquias Sul",2),("Setor de Clubes Esportivos Norte",2),("Setor de Clubes Esportivos Sul",2),("Setor de Diversões Norte",2),
("Setor de Diversões Sul",2),("Setor de Divulgação Cultural",2),("Setor de Grandes Áreas Norte (Leste)",2),("Setor de Grandes Áreas Norte (Oeste)",2),("Setor de Grandes Áreas Sul (Leste)",2);
insert tb_bairro (Nome_Bairro,TB_Cidade_PK_Cidade)
values
-- Brasilia = 2
("Setor de Grandes Áreas Sul (Oeste)",2),("Setor de Rádio e Televisão Norte",2),("Setor de Rádio e Televisão Sul",2),("Setor de Recreação Pública Sul",2),("Setor Hípico",2),
("Setor Hospitalar Local Norte",2),("Setor Hospitalar Local Sul",2),("Setor Hoteleiro Norte",2),("Setor Hoteleiro Sul",2),("Setor Médico Hospitalar Norte",2);
insert tb_bairro (Nome_Bairro,TB_Cidade_PK_Cidade)
values
-- Brasilia = 2
("Setor Médico Hospitalar Sul",2),("Setor Militar Urbano",2),("Setor Policial",2),("Setores Complementares",2),("Vila Planalto",2),
("Zona Cívico-Administrativa",2),("Zona Industrial",2);
SELECT * FROM casalimpa.tb_bairro;

-- cadastro de Bairros Brazlândia = 3
SELECT * FROM casalimpa.tb_bairro;
insert tb_bairro (Nome_Bairro,TB_Cidade_PK_Cidade)
values
-- Brazlândia = 3
("Colônia Agrícola Alexandre Gusmão",3),("Setor Norte",3),("Setor Sul",3),("Setor Tradicional",3),("Veredas",3),
("Vila São José",3);

-- cadastro de Bairros Candangolândia = 4

SELECT * FROM casalimpa.tb_bairro;
insert tb_bairro (Nome_Bairro,TB_Cidade_PK_Cidade)
values
-- Candangolândia = 4
("Candangolândia",4);

-- cadastro de Bairros Ceilândia = 5
insert tb_bairro (Nome_Bairro,TB_Cidade_PK_Cidade)
values
-- Ceilândia = 5
("ADE - Centro Norte",5),("Ceilândia Centro",5),("Ceilândia Norte",5),("Ceilândia Sul",5),("Setor Industrial",5);

-- cadastro de Bairros Cruzeiro = 6
SELECT * FROM casalimpa.tb_bairro;
insert tb_bairro (Nome_Bairro,TB_Cidade_PK_Cidade)
values
-- Cruzeiro = 6
("Área Octogonal",6),("Cruzeiro Novo",6),("Cruzeiro Velho",6),("Setor Sudoeste",6);

-- cadastro de Bairros Gama = 7
SELECT * FROM casalimpa.tb_bairro;
insert tb_bairro (Nome_Bairro,TB_Cidade_PK_Cidade)
values
-- Gama = 7
("Área Alfa",7),("Cidade Nova",7),("Setor Central",7),("Setor Industrial",7),("Setor Leste",7),
("Setor Norte",7),("Setor Oeste",7),("Setor Sul",7);

-- cadastro de Bairros Guará = 8
SELECT * FROM casalimpa.tb_bairro;
insert tb_bairro (Nome_Bairro,TB_Cidade_PK_Cidade)
values
-- Guará = 8
("Guará I",8),("Guará II",8),("Quadras Econômicas Lúcio Costa",8),("Vila Estrutural",8),("Zona Industrial",8);

-- cadastro de Bairros Lago Norte = 9
SELECT * FROM casalimpa.tb_bairro;
insert tb_bairro (Nome_Bairro,TB_Cidade_PK_Cidade)
values
-- Lago Norte = 9
("Setor de Habitações Individuais Norte",9);

-- cadastro de Bairros Lago Sul = 10
SELECT * FROM casalimpa.tb_bairro;
insert tb_bairro (Nome_Bairro,TB_Cidade_PK_Cidade)
values
-- Lago Sul = 10
("Setor de Habitações Individuais Sul",10);

-- cadastro de Bairros Núcleo Bandeirante = 11
SELECT * FROM casalimpa.tb_bairro;
insert tb_bairro (Nome_Bairro,TB_Cidade_PK_Cidade)
values
-- Núcleo Bandeirante = 11
("Metropolitana",11),("Núcleo Bandeirante",11),("Setor de Indústrias Bernardo Sayão",11),("Setor de Mansões Park Way",11),("Setor de Oficinas",11);

-- cadastro de Bairros Paranoá = 12
SELECT * FROM casalimpa.tb_bairro;
insert tb_bairro (Nome_Bairro,TB_Cidade_PK_Cidade)
values
-- Paranoá = 12
("Paranoá",12);

-- cadastro de Bairros Planaltina = 13
insert tb_bairro (Nome_Bairro,TB_Cidade_PK_Cidade)
values
-- Paranoá = 13
("Arapoanga",13),("Condomínio Mestre D'Armas",13),("Estância Mestre D'Armas",13),("Jardim Roriz",13),("Mansões Itiquira",13),
("Portal do Amanhecer",13),("Setor Administrativo",13),("Setor Comercial Central",13),("Setor de Educação",13),("Setor de Hotéis e Diversões",13),
("Setor Hospitalar",13),("Setor Norte",13),("Setor Recreativo e Cultural",13),("Setor Residencial Leste",13),("Setor Residencial Norte",13),
("Setor Tradicional",13),("Vale do Amanhecer",13),("Vila Nossa Senhora de Fátima",13),("Vila Vicentina",13);

-- cadastro de Bairros Recanto das Emas = 14
insert tb_bairro (Nome_Bairro,TB_Cidade_PK_Cidade)
values
-- Recanto das Emas = 14
("Recanto das Emas",14);

-- cadastro de Bairros Riacho Fundo = 15
insert tb_bairro (Nome_Bairro,TB_Cidade_PK_Cidade)
values
-- Riacho Fundo = 15
("Riacho Fundo I",15),("Riacho Fundo II",15);

-- cadastro de Bairros Samambaia = 16
insert tb_bairro (Nome_Bairro,TB_Cidade_PK_Cidade)
values
-- Samambaia = 16
("Samambaia Norte",16),("Samambaia Sul",16);

-- cadastro de Bairros Santa Maria = 17
insert tb_bairro (Nome_Bairro,TB_Cidade_PK_Cidade)
values
-- Santa Maria = 17
("Condomínio Residencial Santa Maria",17),("Santa Maria",17),("Sítio do Gama",17);

-- cadastro de Bairros São Sebastião = 18
insert tb_bairro (Nome_Bairro,TB_Cidade_PK_Cidade)
values
-- São Sebastião = 18
("Bela Vista",18),("Centro",18),("João Cândido",18),("Morro Azul",18),("Residencial do Bosque",18),
("São Francisco",18),("Setor Residencial Oeste",18),("Setor Tradicional",18),("Vila Nova",18),("Vila São José",18);

-- cadastro de Bairros Sobradinho = 19
insert tb_bairro (Nome_Bairro,TB_Cidade_PK_Cidade)
values
-- Sobradinho = 19
("Setor Econômico de Sobradinho",19),("Setor Industrial",19),("Sobradinho",19),("Sobradinho II",19);

-- cadastro de Bairros Taguatinga = 20
insert tb_bairro (Nome_Bairro,TB_Cidade_PK_Cidade)
values
-- Taguatinga = 20
("ADE (Águas Claras)",20),("Areal (Águas Claras)",20),("Norte (Águas Claras)",20),("Setor de Desenvolvimento Econômico",20),("Setor Industrial",20),
("Sul (Águas Claras)",20),("Taguatinga Centro",20),("Taguatinga Norte",20),("Taguatinga Sul",20);