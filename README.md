# Oman Cargo Operational Protocols

## 1. import: Factory Stuffing (FCL)
**BILL OF LADING FORMAT**
- **Shipper**: XYZ Export Pvt Ltd
- **Consignee**: ABC Trading LLC
- **Notify Party**: Same as Consignee
- **Place of Receipt**: Factory Address (e.g., Ahmedabad)
- **Port of Loading**: Mundra Port
- **Port of Discharge**: Jebel Ali
- **Place of Delivery**: Dubai
- **Container Details**:
    - **Container No**: [DYNAMIC]
    - **Seal No**: [DYNAMIC]
    - **Stuffing Type**: Factory Stuffed (FCL)
- **Cargo Description**: 500 Cartons of Ceramic Tiles
- **Gross Weight**: 25,000 KGS
- **Measurement**: 28 CBM
- **Freight**: Prepaid / Collect
- **Stuffing Location**: Factory Premises
- **Remarks**: "Shipper Load, Stow, Count & Seal"

---

## 2. import: Dock Stuffing (LCL/FCL)
**BILL OF LADING FORMAT**
- **Shipper**: XYZ Export Pvt Ltd
- **Consignee**: ABC Trading LLC
- **Notify Party**: Same as Consignee
- **Place of Receipt**: CFS Warehouse (e.g., Mundra CFS)
- **Port of Loading**: Mundra Port
- **Port of Discharge**: Jebel Ali
- **Place of Delivery**: Dubai
- **Container Details**:
    - **Container No**: [DYNAMIC]
    - **Seal No**: [DYNAMIC]
    - **Stuffing Type**: Dock Stuffing (LCL/FCL)
- **Cargo Description**: 300 Bags of Chemicals
- **Gross Weight**: 18,000 KGS
- **Measurement**: 22 CBM
- **Freight**: Prepaid / Collect
- **Stuffing Location**: CFS / Port Yard
- **Remarks**: "Cargo stuffed at CFS under customs supervision"

---

## 3. Import: De-Stuffing & Delivery
**IMPORT DELIVERY / DESTUFFING SHEET**
- **B/L No**: [DYNAMIC]
- **Vessel Name**: [DYNAMIC]
- **Voyage No**: [DYNAMIC]
- **Consignee**: ABC Trading LLC
- **Container No**: [DYNAMIC]
- **Seal No**: [DYNAMIC]
- **Port of Discharge**: Mundra Port
- **CFS Location**: XYZ CFS Mundra
- **De-stuffing Date**: DD/MM/YYYY
- **Cargo Details**: 500 Cartons
- **Damage Report**: NIL / Mention if any
- **Delivery Type**: FCL / LCL
- **Final Delivery**: Warehouse / Factory
- **Remarks**: "Container de-stuffed under supervision"

---

## Operational Comparison Matrix

| Field             | Factory | Dock | Import |
| ----------------- | ------- | ---- | ------ |
| Stuffing Type     | ✅       | ✅    | ❌      |
| Stuffing Location | Factory | CFS  | ❌      |
| CFS Name          | ❌       | ✅    | ✅      |
| De-stuffing Date  | ❌       | ❌    | ✅      |
| Damage Report     | ❌       | ❌    | ✅      |
