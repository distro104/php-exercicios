<?php

class database
{
    public function query(string $sql, array $params = [])
    {
        try {
            // CONEXAO E COMUNICACAO COM O BD
            var_dump(
                DB_HOST,DB_PORT,DB_NAME,DB_USER,DB_PASS
            );
            $pdo = new PDO('mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $pdo->prepare($sql);
            $stmt->execute($params);

            // DEVOLVE OS RESULTADOS
            $results = $stmt->fetchAll(PDO::FETCH_CLASS);
            return [
                'status' => 'success',
                'data' => $results
            ];
            
        } catch (\PDOException $err) {
            // DEVOLVE O ERRO
            return [
                'status' => 'error',
                'data' => $err->getMessage() 
            ];
        }
    }
}

