# Porkbun DNS Plugin for VitoDeploy

A DNS provider plugin for [VitoDeploy](https://vitodeploy.com) that integrates with Porkbun's DNS API.

## Installation

1. Log in to your VitoDeploy admin panel
2. Go to **Admin** → **Plugins** → **Community**
3. Search for **vito-dns-porkbun**
4. Click **Install** to install the plugin
5. After installation, go to **Installed** tab
6. Find **vito-dns-porkbun** in the list
7. Click the three dots (⋮) on the right side
8. Select **Enable**

## Getting Porkbun API Credentials

### Step 1: Enable API Access

1. Log in to your [Porkbun account](https://porkbun.com)
2. Navigate to **Account** → **Domain Manager**
3. Select one of your domains
4. Click on the domain details
5. Find the **API Access** toggle and turn it on

### Step 2: Generate API Key and Secret Key

1. After enabling API access, go to **Account** → **API Access**
2. Enter a name for your API key in the **API Key Title** field (e.g., "VitoDeploy")
3. Click **Create API Key**
4. You will receive:
   - **API Key**: Public key for authentication
   - **Secret Key**: Private key for authentication

> **Important**: Save both keys securely. The Secret Key will only be shown once.

### Step 3: Configure in VitoDeploy

1. Go to VitoDeploy Dashboard
2. Navigate to **Settings** → **DNS Providers** → **Connect**
3. In Provider, select **Porkbun**
4. Enter a profile name for your provider (e.g., "Porkbun")
5. Enter your API Key and Secret Key
6. Click **Connect** to verify your credentials

## Features

- **Create DNS Records**: Support for A, AAAA, CNAME, TXT, MX, and other record types
- **Read DNS Records**: Fetch all DNS records for a domain
- **Update DNS Records**: Modify existing DNS records
- **Delete DNS Records**: Remove DNS records

## Limitations

The following fields are not available from Porkbun's API:

| Field | Reason |
|-------|--------|
| `created_on` | Porkbun API does not return creation timestamp for DNS records |
| `modified_on` | Porkbun API does not return modification timestamp for DNS records |
| `proxied` | Porkbun does not support Cloudflare-style proxying; this is always set to `false` |

For domain-level dates (`created_on`, `modified_on` on domains), the plugin uses available data (`createDate` and `expireDate` from the domain list API).

### Known Issues

**Timeout when adding domains**: When adding a domain, you may experience a timeout. This is because the plugin fetches all domains from your Porkbun account to locate the correct domain ID. If you have many domains registered with Porkbun, this process can take longer than the default timeout allows.

## Supported Record Types

- A - Address record
- AAAA - IPv6 address record
- ALIAS - CNAME flattening record
- CAA - Certification Authority Authorization
- CNAME - Canonical name record
- HTTPS - HTTPS Service Record
- MX - Mail exchange record
- NS - Name server record
- SRV - Service record
- SSHFP - Secure Shell fingerprint record
- SVCB - Service Binding Record
- TLSA - TLS Authentication Record
- TXT - Text record

## Credits

- [Porkbun](https://porkbun.com) - Domain registration and DNS services
- [VitoDeploy](https://vitodeploy.com) - Server management platform
