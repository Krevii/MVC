<?php
class Model_Blogs extends Model
{
	public function get_blogs($search_query = null)
	{
        $conn = new mysqli("127.0.0.1", "root", "", "virtups");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM articles";
        if (!empty($search_query)) {
            $sql = "SELECT * FROM articles WHERE title LIKE '%$search_query%'";
        }
        $result = $conn->query($sql);

        if ($result->num_rows < 1) {
            Route::ErrorPage404();
        }

        mysqli_close($conn);
        
        return $result;
	}
}
?>