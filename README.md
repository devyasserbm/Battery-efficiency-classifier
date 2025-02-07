# Battery Efficiency Classifier

The Battery Efficiency Classifier is a web-based tool designed to help users assess the efficiency of batteries and estimate the cost of replacing inefficient batteries.

## Software Features
- **Languages**: Written in PHP and HTML.
- **Local Environment**: Uses XAMPP as the local server.
- **User Interface**: Provides an easy-to-use interface for users to classify battery efficiency and calculate replacement costs.
  
## Audience
- Targeted for **electronic companies** and **stores** that deal with battery management and replacement.

## Efficiency Classification
Batteries are classified into three categories based on their efficiency:
- **Efficient**: Efficiency ≥ 80%
- **Good**: 40% ≤ Efficiency < 80%
- **Bad**: Efficiency < 40%

### Additional Feature
- **Replacement Cost Calculation**: The system allows users to calculate the cost of replacing "bad" batteries (efficiency < 40%). The cost is calculated as $2 per bad battery.

## Getting Started

### Prerequisites
- Install XAMPP to run the application locally.
- PHP 7.4+ and a modern web browser.

### Installation
1. **Download the `index.php` file**:  
   Download the `index.php` file from the repository:
   [Download index.php](https://github.com/devyasserbm/Battery-efficiency-classifier/blob/main/index.php)

2. **Move the `index.php` file**:
   Copy the `index.php` file into the `htdocs` directory, which is located in your XAMPP installation folder.

   On Windows, it is usually:
   ```bash
   C:/xampp/htdocs/

   
Run the application: Open your web browser and go to:
http://localhost/index.php
