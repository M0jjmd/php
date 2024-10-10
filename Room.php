<?php
class Room
{
    private static $conn;

    public static function setConnection($connection)
    {
        self::$conn = $connection;
    }

    public static function getAllRooms()
    {
        $query = "SELECT * FROM rooms";
        $stmt = self::$conn->query($query);

        if (!$stmt) {
            die("Error en la consulta: " . self::$conn->error);
        }

        $result = [];
        while ($room = $stmt->fetch_assoc()) {
            $result[] = $room;
        }

        return $result;
    }

    public static function getSingleRoom($target_id)
    {
        $queryID = "SELECT * FROM rooms where id = ?";
        $stmt = self::$conn->prepare($queryID);

        if (!$stmt) {
            die("Error al preparar la consulta: " . self::$conn->error);
        }

        $stmt->bind_param("i", $target_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return [$result->fetch_assoc()];
        } else {
            return [];
        }
    }

    public static function insertRoom($roomData)
    {
        $query = "INSERT INTO rooms (photo, room_number, bed_type, rate, offer_price, status) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = self::$conn->prepare($query);

        if (!$stmt) {
            die("Error al preparar la consulta: " . self::$conn->error);
        }

        $stmt->bind_param("sisiis", $roomData["photo"], $roomData["room_number"], $roomData["bed_type"], $roomData["rate"], $roomData["offer_price"], $roomData["status"]);

        if ($stmt->execute()) {
            return $stmt->insert_id;
            echo ("Room inserted correctly");
        } else {
            die("Error al crear la habitación: " . self::$conn->error);
        }

        $stmt->close();
    }

    public static function getJsonData()
    {
        $data = file_get_contents("ApiData.json");
        $json = json_decode($data, true);
        return $json['rooms'];
    }
}
