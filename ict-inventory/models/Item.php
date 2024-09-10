<?php
require_once 'db.php';

class Item {
    
    public static function count() {
        global $connection;
        $result = $connection->query("SELECT COUNT(*) as count FROM items");
        $row = $result->fetch_assoc();
        return $row['count'];
    }

    public static function findByInventoryItemNo($inventoryItemNo) {
        global $connection;
    
        // Prepare the SQL statement
        $stmt = $connection->prepare("SELECT * FROM items WHERE inventory_item_no = ?");
        
        // Bind the inventory item number parameter
        $stmt->bind_param("s", $inventoryItemNo);
        
        // Execute the query
        $stmt->execute();
        
        // Get the result
        $result = $stmt->get_result();
    
        // Check if any rows are returned
        if ($result->num_rows > 0) {
            // Fetch data and return it
            $item = $result->fetch_assoc();
            return $item;
        } else {
            // No item found, return null
            return null;
        }
    }

    public static function findByAssetOwnerWithSearch($assetOwner, $searchTerm = '', $currentPage = 1, $perPage = 12) {
        global $connection;
        
        $offset = ($currentPage - 1) * $perPage;
        
        // Include the search term in the query
        $query = "SELECT * FROM items WHERE asset_owner = ? AND (serial_no LIKE ? OR equipment_type LIKE ? OR description LIKE ?) LIMIT ? OFFSET ?";
        
        $searchTerm = '%' . $searchTerm . '%';
        $stmt = $connection->prepare($query);
        $stmt->bind_param("ssssii", $assetOwner, $searchTerm, $searchTerm, $searchTerm, $perPage, $offset);
        $stmt->execute();
        
        $result = $stmt->get_result();
        
        $assets = [];
        while ($row = $result->fetch_assoc()) {
            $assets[] = $row;
        }
        
        return $assets;
    }
    
    

// Revised PHP function to get acquisition count by date
    public static function getItemCountByDateAcquired() {
        global $connection;
        $query = "SELECT date_acquired, COUNT(*) as count FROM items GROUP BY date_acquired ORDER BY date_acquired ASC";
        $result = $connection->query($query);

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = [
                'date' => $row['date_acquired'],
                'count' => (int) $row['count'],
            ];
        }
        return $data;
    }

    

    public static function findById($itemNo) {
        global $connection;
    
        // Prepare the SQL statement
        $stmt = $connection->prepare("SELECT * FROM items WHERE item_no = ?");
        
        // Bind the inventory item number parameter
        $stmt->bind_param("s", $itemNo);
        
        // Execute the query
        $stmt->execute();
        
        // Get the result
        $result = $stmt->get_result();
    
        // Check if any rows are returned
        if ($result->num_rows > 0) {
            // Fetch data and return it
            $item = $result->fetch_assoc();
            return $item;
        } else {
            // No item found, return null
            return null;
        }
    }

    public function update($data) {
        global $connection;

        // Extract data from the array
        $itemNo = $data['item_no'];
        $equipmentType = $data['equipment_type'];
        $acquisitionType = $data['acquisition_type'];
        // Extract other fields as needed...

        // Prepare the SQL statement
        $stmt = $connection->prepare("UPDATE items SET equipment_type = ?, acquisition_type = ? WHERE item_no = ?");
        
        if (!$stmt) {
            // Error handling for failed query preparation
            error_log("Failed to prepare statement: " . $connection->error);
            return false;
        }

        // Bind parameters
        $stmt->bind_param("sss", $equipmentType, $acquisitionType, $itemNo);

        // Execute the statement
        $result = $stmt->execute();

        if (!$result) {
            // Error handling for failed execution
            error_log("Error executing query: " . $stmt->error);
            return false;
        }

        return true; // Update successful
    }
    

    public static function countByEquipmentType($equipmentType) {
        global $connection;
        $result = $connection->query("SELECT COUNT(*) as count FROM items WHERE equipment_type = '$equipmentType'");
        $row = $result->fetch_assoc();
        return $row['count'];
    }

    public static function countByStatus($status) {
        global $connection;
        $result = $connection->query("SELECT COUNT(*) as count FROM items WHERE status = '$status'");
        $row = $result->fetch_assoc();
        return $row['count'];
    }

    public static function countByAcquisitionType($acquisitionType) {
        global $connection;
        $result = $connection->query("SELECT COUNT(*) as count FROM items WHERE acquisition_type = '$acquisitionType'");
        $row = $result->fetch_assoc();
        return $row['count'];
    }

    public static function countBySection($section) {
        global $connection;
        $result = $connection->query("SELECT COUNT(*) as count FROM items WHERE section = '$section'");
        $row = $result->fetch_assoc();
        return $row['count'];
    }

    public static function create($data) {
        global $connection;

        // Define the fields and values for insertion
        $fields = [];
        $values = [];
        foreach ($data as $key => $value) {
            $fields[] = $key;
            $values[] = "'" . $connection->real_escape_string($value) . "'";
        }

        // Construct the SQL query
        $sql = "INSERT INTO items (" . implode(',', $fields) . ") VALUES (" . implode(',', $values) . ")";

        // Execute the query
        if ($connection->query($sql) === TRUE) {
            return true; // Item created successfully
        } else {
            return false; // Error creating item
        }
    }

    public static function viewDesktopItems() {
        global $connection;

        // Define the SQL query to fetch desktop items
        $sql = "SELECT * FROM items WHERE equipment_type = 'Desktop'";

        // Execute the query
        $result = $connection->query($sql);

        // Check if any rows are returned
        if ($result->num_rows > 0) {
            // Initialize an array to store desktop items
            $desktopItems = [];

            // Fetch data and add it to the array
            while ($row = $result->fetch_assoc()) {
                $desktopItems[] = $row;
            }

            // Return the array of desktop items
            return $desktopItems;
        } else {
            // Return null if no desktop items found
            return null;
        }
    }

    public static function viewLaptopItems() {
        global $connection;

        // Define the SQL query to fetch desktop items
        $sql = "SELECT * FROM items WHERE equipment_type = 'Laptop'";

        // Execute the query
        $result = $connection->query($sql);

        // Check if any rows are returned
        if ($result->num_rows > 0) {
            // Initialize an array to store laptop items
            $laptopItems = [];

            // Fetch data and add it to the array
            while ($row = $result->fetch_assoc()) {
                $laptopItems[] = $row;
            }

            // Return the array of laptop items
            return $laptopItems;
        } else {
            // Return null if no laptop items found
            return null;
        }
    }

    public static function viewPrinterItems() {
        global $connection;

        // Define the SQL query to fetch desktop items
        $sql = "SELECT * FROM items WHERE equipment_type IN ('Printer - MFP', 'Plotter', 'Printer - MFP Wide Format', 'Printer - Single Function')";

        // Execute the query
        $result = $connection->query($sql);

        // Check if any rows are returned
        if ($result->num_rows > 0) {
            // Initialize an array to store laptop items
            $laptopItems = [];

            // Fetch data and add it to the array
            while ($row = $result->fetch_assoc()) {
                $laptopItems[] = $row;
            }

            // Return the array of laptop items
            return $laptopItems;
        } else {
            // Return null if no laptop items found
            return null;
        }
    }

    public static function viewItems() {
        global $connection;

        // Define the SQL query to fetch desktop items
        $sql = "SELECT * FROM items";

        // Execute the query
        $result = $connection->query($sql);

        // Check if any rows are returned
        if ($result->num_rows > 0) {
            // Initialize an array to store laptop items
            $laptopItems = [];

            // Fetch data and add it to the array
            while ($row = $result->fetch_assoc()) {
                $laptopItems[] = $row;
            }

            // Return the array of laptop items
            return $laptopItems;
        } else {
            // Return null if no laptop items found
            return null;
        }
    }

    public static function countByAssetOwner($assetOwner) {
        global $connection;
        
        $stmt = $connection->prepare("SELECT COUNT(*) as count FROM items WHERE asset_owner = ?");
        $stmt->bind_param("s", $assetOwner);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();
        
        return $count;
    }
    
    // Define properties to match the database fields
    public $computer_name;
    public $equipment_type;
    public $acquisition_type;
    public $processor;
    public $ram;
    public $disk_size;
    public $licensed_os;
    public $licensed_mso;
    public $other_installed_software;
    public $status;
    public $are_par_ics;
    public $serial_no;
    public $inventory_item_no;
    public $description;
    public $model;
    public $brand;
    public $unit_cost;
    public $end_user;
    public $designation;
    public $section;
    public $asset_owner;
    public $date_received;
    public $received_from;
    public $supplier;
    public $acquisition_date;
    public $remarks;

    // Constructor to set properties if needed
    public function __construct($data = []) {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }
}
