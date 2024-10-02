<h1>1. Create CCE </h1>

<h2>spesifications </h2>

- **CLUSTER TYPE:**  CCE Standard Cluster
- **Billing Mode:** pay-per-use
- **Cluster Version:** v1.29
- **Cluster Scale:** Node50
- **Master Nodes:** Single
- **VPC:** basic default VPC
- **Default Node Security Group:** Auto Generate
- **Network Model** Tunnel Network
- **Container CIDR Block:** Auto Select
  ![alt text](images/image-1.png)

  ![alt text](images/image-2.png)

<h2> Add-On </h2>

![alt text](images/image.png)

**De-select all add-ons**

<h1>2. Create a Node </h1>

- Under the Nodes Tab Go to your Nodes and Click create Node
  ![alt text](images/image-11.png)
- specification 
  ![alt text](images/image-12.png)
- **Billing Mode** Pay-per-useNode 
- **Type** Elastic Cloud Server (VM)
- **Specifications** General computing-plus | c7n.2xlarge.4 | 8 vCPUs | 32 GB | 
- **Container** Engine docker 
- **OS** Huawei Cloud EulerOS 2.0
- **EIP** Auto Create Dynamic BGP | Traffic | 100 Mbit/s

<h1>3. Create StatefulSet Mysql-server Workload </h1>

- From Workloads go to StatefulSets and click Create Workload
  ![alt text](images/image-3.png)
- choose pod number and be sure it is StatefulSet
- select your  images/image and version
  ![alt text](images/image-4.png)
- Add the folowing environmental variables
  - MYSQL_ROOT_PASSWORD	my-secret-pw
  - MYSQL_MYSQL_DATABASE	user_auth
  - MYSQL_USER	db_user
  - MYSQL_PASSWORD	my-secret-pw
    ![alt text](images/image-5.png)
- Set the Headless Service Parameters as **mysql** as service name and Port Name and 3306 as Service Port and Container Port 
  ![alt text](images/image-6.png)
- Click Create  Workload

<h1>4. Create Deployment Apache-server Workload </h1>

- From Workloads go to Deployment and click Create Workload
  ![alt text](images/image-7.png)
- choose pod number and be sure it is Deployment
- select your  images/image and version
  ![alt text](images/image-8.png)
- Add the folowing environmental variables
  - password	my-secret-pw
  - servername	mysql
  - username	root
  - database	user_auth
    ![alt text](images/image-9.png)
- Set the Loadbalancer Service Parameters auto create one and connect 80 service port to 80 container port
  ![alt text](images/image-10.png)
- Click Create  Workload


