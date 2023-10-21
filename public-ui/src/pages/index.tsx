import * as React from "react";
import { NextPage } from "next";
import { useRouter } from "next/router";
import Image from "next/image";
import { Inter } from "next/font/google";
import { RootLayout } from "@/layouts/RootLayout";

const inter = Inter({ subsets: ["latin"] });

const Home: NextPage = () => {
  const router = useRouter();

  return (
    <RootLayout>
      <h1>Hallo World</h1>
    </RootLayout>
  );
};

export default Home;
