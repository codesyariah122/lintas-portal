"use client";
/**
 * @author: puji ermanto <pujiermanto@gmail.com>
 * @return: React.FC
 */
import * as React from "react";
import Head from "next/head";
import { useRouter } from "next/router";
import Link from "next/link";
import { Spinner, RootNavbar, RootHero } from "@/components";
import classNames from "classnames";

interface Props {
  children: React.ReactNode;
  menus?: any;
  fields?: any;
  isLoading?: boolean;
  messagePage?: string;
  pageTitle?: string;
  header?: string;
  colors?: Object | string | any;
}

export const RootLayout: React.FC<Props> = ({ children, ...props }) => {
  let current = "Welcome in Admin Panel";
  const router = useRouter();
  const pathName = router.pathname;

  if (props.isLoading) {
    return <Spinner />;
  }

  return (
    <React.Fragment>
      <RootNavbar />
      <main className="flex flex-col min-h-screen p-2">
        <RootHero />
        {children}
      </main>
    </React.Fragment>
  );
};
