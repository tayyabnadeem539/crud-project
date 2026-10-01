import mysql from "mysql2/promise";

export default async (req) => {

    if (req.method !== "POST") {
        return new Response(
            JSON.stringify({
                success: false,
                message: "Only POST requests are allowed"
            }),
            {
                status: 405,
                headers: {
                    "Content-Type": "application/json"
                }
            }
        );
    }

    try {

        const data = await req.json();

        const name = data.name;
        const email = data.email;
        const city = data.city;
        const password = data.password;
        const age = data.age;

        if (!name || !email || !city || !password || !age) {
            return new Response(
                JSON.stringify({
                    success: false,
                    message: "All fields are required"
                }),
                {
                    status: 400,
                    headers: {
                        "Content-Type": "application/json"
                    }
                }
            );
        }

        const connection = await mysql.createConnection({
            host: process.env.DB_HOST,
            port: process.env.DB_PORT,
            user: process.env.DB_USER,
            password: process.env.DB_PASSWORD,
            database: process.env.DB_NAME,
            ssl: {
                rejectUnauthorized: true
            }
        });

        const query = `
            INSERT INTO person
            (name, email, city, password, age)
            VALUES (?, ?, ?, ?, ?)
        `;

        await connection.execute(query, [
            name,
            email,
            city,
            password,
            age
        ]);

        await connection.end();

        return new Response(
            JSON.stringify({
                success: true,
                message: "Data sent successfully"
            }),
            {
                status: 200,
                headers: {
                    "Content-Type": "application/json"
                }
            }
        );

    } catch (error) {

        console.error(error);

        return new Response(
            JSON.stringify({
                success: false,
                message: "Data sending failed"
            }),
            {
                status: 500,
                headers: {
                    "Content-Type": "application/json"
                }
            }
        );
    }
};